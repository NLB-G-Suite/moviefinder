var search = instantsearch({
	appId: 'TS78Q0T9O7',
	apiKey: '1f86711c3dc2fddfc8c7e756603ab99d',
	indexName: 'movies',
	urlSync: true
});

search.addWidget(
  instantsearch.widgets.pagination({
    container: '#pagination-container',
    maxPages: 20
  })
);


search.start();