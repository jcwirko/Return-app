$(document).ready(function(){
    if(window.jQuery){
        if($.fn.DataTable){
            $('.dts').DataTable({
                language: {
                    url: '/libs/datatables/spanish.json'
                }
            });
        }
    }

});