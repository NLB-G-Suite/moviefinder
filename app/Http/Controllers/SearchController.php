<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;
use App\Extra;


class SearchController extends Controller
{
    public function index() {
        return view('search');
    }

    public function search(Request $request)
    {
        $error = ['error' => 'No results found, please try with different keywords.'];

        if($request->has('q')) {
            $movies = array();
            $movies_info = Movie::search($request->get('q'))->get();
            // dd($movies_info);
            $decoded_movies = json_decode($movies_info);
            $movies_count = count($decoded_movies);
            if ( $movies_count > 0) {
                $movies = $this->rank($decoded_movies);
            }

            return $movies ? $movies : $error;
        }

        return $error;
    }

    public function info($id)
    {
        $error = ['error' => 'No results found'];

        if(isset($id)) {
            
            $movies = collect(Movie::where('id','=', $id)->first());
            $extras = collect(Extra::where('movie_id', '=', $id)->first());
            $infos = $movies->merge($extras);

            return $infos ? $infos : $error;

        }

        return $error;
    }

    private function rank($movies) {

        $s = 0.20;
        
        $current_path = request()->fullUrl();
        $request = explode('=', $current_path);
        $query = $request[1];
        $terms_array = explode('%20', $query);

        // dd($terms_array);

        $terms_of_query = array_count_values($terms_array);
        $N1 = count($movies);

        $doc_length = $this->getDocLength($movies);
        $avrg_doc_length = $doc_length/$N1;

        foreach ($terms_of_query as $term => $qtf) {
            $R = $this->getDocFrequency($movies, $term);
            foreach ($movies as $movie) {
                $term_frequency = $this->getTermFrequency($movie->id, $term);
                if ($term_frequency != NULL){
                    $VSM = (1+log(1+log($term_frequency))/(1-$s)+($s*($doc_length/$avrg_doc_length)))*$qtf*log(($N1+1)/$R);
                    $movie->rank = $VSM;
                } else {
                    $movie->rank = 0;
                }
            }
        }

        usort($movies, function($a, $b) {
            return $a->rank > $b->rank ? -1 : 1;
        });  

        return $movies;
    }

    private function getDocLength($movies){
        $doc_length = 0;
        foreach ($movies as $movie) {
            $contents = file_get_contents('pages/'.$movie->id.'.txt');
            $doc_length = $doc_length + strlen($contents);
        }
        return $doc_length;
    }

    private function getDocFrequency($movies, $term){
        $count_doc_freq = 0;
        foreach ($movies as $movie) {
            $this_doc = $movie->id;
            $getTermFrequency = $this->getTermFrequency($this_doc, $term);
            if ($getTermFrequency != NULL){
                $count_doc_freq++;
            }
        }
        return $count_doc_freq;
    }
    
    private function getTermFrequency($doc, $term){
        $contents = file_get_contents('pages/'.$doc.'.txt');
        $countTerms = array_count_values(str_word_count(strip_tags($contents), 1));
        if(isset($countTerms[$term])){
            return $countTerms[$term];
        } else {
            return NULL;
        }
        
    }
}
