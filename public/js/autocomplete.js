var client = algoliasearch("TS78Q0T9O7", "1f86711c3dc2fddfc8c7e756603ab99d")
  var index = client.initIndex('movies');
  var myAutocomplete = autocomplete('#search-input', {hint: false}, [
    {
      source: autocomplete.sources.hits(index, {hitsPerPage: 7}),
      displayKey: 'title',
      templates: {
        suggestion: function(suggestion) {
          var sugTemplate = 
          "<img style='width:30px; height:30px' src='"+ suggestion.image +"'/><span><div style='position: relative; display: inline;top: -8px; margin-left: 6px'>"+ 
          suggestion._highlightResult.title.value +"</span>&nbsp;<span class='dir'>dir : "+ 
          suggestion._highlightResult.director.value +"</span></div><div style='margin-left:36px;margin-top: -16px'><span class='dir'>casts: "+ 
          suggestion._highlightResult.cast.value +"</span></div>"
          return sugTemplate;
        }
      },
    }
  ]).on('autocomplete:selected', function(event, suggestion, dataset) {
    console.log(suggestion, dataset);
  });

document.querySelector(".searchbox [type='reset']").addEventListener("click", function() {
  document.querySelector(".aa-input").focus();
  this.classList.add("hide");
  myAutocomplete.autocomplete.setVal("");
});

document.querySelector("#search-input").addEventListener("keyup", function() {
  var searchbox = document.querySelector(".aa-input");
  var reset = document.querySelector(".searchbox [type='reset']");
  if (searchbox.value.length === 0){
    reset.classList.add("hide");
  } else {
    reset.classList.remove('hide');
  }
});



