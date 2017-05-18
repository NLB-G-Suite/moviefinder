function sleep(time) {
  var d1 = new Date().getTime();
  var d2 = new Date().getTime();
  while (d2 < d1 + time) {
    d2 = new Date().getTime();
  }
  return;
}

new Vue({
    el: 'body',

    data: {
	    movies: [],
	    show: false,
	    result: false,
	    loading: false,
	    error: false,
	    query: '',
	    infos: []
	},

	beforeCompile() {
		// simulated work
		sleep(1000);
	},

	methods: {
	    browse: function() {
	        // Clear the error message.
	        this.error = '';
	        // Empty the products array so we can fill it with the new products.
	        this.movies = [];
	        // Set the loading property to true, this will display the "Searching..." button.
	        this.result = false;
	        this.loading= true;

	        // Making a get request to our API and passing the query to it.
	        this.$http.get('/search?q=' + this.query).then((response) => {
	        	console.log(response.body);
	        	
	        	this.show = false;
	            // If there was an error set the error message, if not fill the products array.
	            response.body.error ? this.error = response.body.error : this.movies = response.body;
	            // The request is finished, change the loading to false again.
	            this.loading = false;
	            this.result = true;
	            // // Clear the query.
	            // this.query = '';
	        });
	    },

	    getInfo: function(id) {
        	this.$http.get('/info/' + id).then((response) => {
	        	this.show = true;
	            response.body.error ? this.error = response.body.error : this.infos = response.body;
	        });
	    }
	}
});