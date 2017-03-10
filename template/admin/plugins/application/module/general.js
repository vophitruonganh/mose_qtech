module.general = {
    ListAction: function (type,ajaxdata,ajaxurl,stateobj,message) {
        var search = module.form.getUrlVars()["search"];
        if(search == undefined || typeof search == 'undefined')
            search = '';
        var page = module.form.getUrlVars()["page"];
        if(page == undefined || typeof page == 'undefined')
            page = 1;
        if(type == 'list'){
            var check = module.form.tableAction();
            if(check == undefined || typeof check == 'undefined' || check == null || check == '')
                return false;
            ajaxdata.check = check;
            var select_action = $('.list-action-select').val();
            if(select_action == '0')
                return false;
            ajaxdata.select_action = select_action;
        }
        ajaxdata._token = $('#page_token').val();
        ajaxdata.page = page;
        ajaxdata.search = search;
        var stateobj = {}
        $('.list-action-select').prop('selectedIndex',0);
        return module.form.ListTable(ajaxdata,ajaxurl,stateobj,message);

    },
    ListSearch: function (ajaxdata,ajaxurl) {   
        var searchInput = module.php.urlencode($('.list-search-input').val());
        if(typeof ajaxdata !== 'object')
            return false;
        ajaxdata._token = $('#page_token').val();
        ajaxdata.search = searchInput;
        ajaxdata.type = 'search';
        var stateobjtitle = $('.section-header').find('h1 span').text();
        var stateobj = {
            StateName: {
                "Search":searchInput
            },
            Title: stateobjtitle,
            URL: "?search="+searchInput
        }
        return module.form.ListTable(ajaxdata,ajaxurl,stateobj);
    }
}