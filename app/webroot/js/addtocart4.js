$(document).ready(function() {
          $('.add').click(function() { return !$('#initialServers td:table').remove().appendTo('#actualServers'); });  
        $('.remove').click(function() { return !$('#actualServers td:table').remove().appendTo('#initialServers'); });
        //$('.submit').click(function() { $('#actualServers option').prop('selected', 'selected'); });
        
        $('.submit').click(function() {
            var serversVal = "";
            var serversText = "";
            $('#actualServers td').each(function(){
                serversVal = serversVal + $(this).val() + "--";
                serversText = serversText + $(this).text() + "--";
            });
            alert(serversVal);
            alert(serversText);
        });

        
        $("#filtro").on("input",function(){
            $('#initialServers td').each(function(){
                if($(this).text().indexOf($("#filtro").val()) == -1){
                    $(this).prop("table", false);
                    $(this).fadeOut();
                }else{
                    $(this).prop("table", false);
                    $(this).fadeIn();
                }
            });
        });
            
    });
    