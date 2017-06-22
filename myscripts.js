$(document).ready(function () {
    

    $("#myForm").submit(function (event) {
    'use strict';
        event.preventDefault();
   //Assume there are no errors
        var errors = false;
                
   //hide error messages
        $(".error").hide();
                
 //Make sure each field is not blank

        if ($("#full-name").val() === "") {
            $("#first_error").show("slow");
            errors = true;
        }
                
        if ($("#eid").val() === "") {
        $("#eidError").show("slow");
        errors = true;
                }
                
    if($("#date").val() === "") {
                    $("#dateError").show("slow");
     errors = true;
                }
    if($("#hours").val() === ""){
                    $("#hoursError").show("slow");
     errors = true;
                }
 
 //If there are errors then show a general error message

if(errors){
                            
  $(".warnings").show("slow").fadeOut(5000);
      
  return false;
}
                
// If no errors show success message
                    
  if(!errors){
                $( "#submit" ).click(function(  ) {
  
  
});
                    
                        $(".overlay").fadeIn();
                    return true;
                      }
                    
 });        //Make the Close window button work
                    $(".close").click(function() {
        $(".overlay").fadeOut();
                  
                
            });
        
});