
   $(document).ready(function() {
      $("#openPopup").click(function() {
         $("#updatePopup").dialog({
            title: "Actualizar datos",
            modal: true,
            width: 400,
            height: 300,
            resizable: false
         });
      });
   });
