
$( function() {

    hideErrorsPanels();

    $('#datepickerFrom').datepicker({ minDate: new Date()}).change(evt => {
        var selectedDate = $('#datepickerFrom').datepicker('getDate');

        selectedDate.setDate(selectedDate.getDate() +1)
        $( "#datepickerTo" ).datepicker( "option", "minDate",selectedDate  );

        $("#datepickerTo").prop('disabled', false);
    });


    $( "#datepickerFrom" ).datepicker( "option", "dateFormat", "yy-mm-dd" );

    $('#datepickerTo').datepicker().change(evt => {

        var selectedDate = $('#datepickerTo').datepicker('getDate');
        selectedDate.setDate(selectedDate.getDate() - 1)
        $( "#datepickerFrom" ).datepicker( "option", "maxDate",selectedDate);

    });
    $("#datepickerFrom").prop('disabled', false);
    $("#datepickerTo").prop('disabled', true);
    $("#datepickerTo" ).datepicker( "option", "dateFormat", "yy-mm-dd" );

    var today = new Date();
    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);;
    $( "#datepickerFrom" ).datepicker( "setDate", today );
    //$( "#datepickerTo" ).datepicker( "setDate", tomorrow );
    //$( "#datepickerFrom" ).datepicker( "option", "maxDate",today);
    $( "#datepickerTo" ).datepicker( "option", "minDate",tomorrow  );
} );

function hideErrorsPanels() {
    hideErrorPanel('#error-destination');
    hideErrorPanel('#error-datepickerFrom');
    hideErrorPanel('#error-datepickerTo');
    hideErrorPanel('#error-guests');
}

function showError(id, text) {
    $(id).show();
    $(id).text(text);
}

function hideErrorPanel(id){
    $(id).hide();
}


function refreshTable() {
    if(checkParams())
        sendPetition();

}

function checkParams(){
    if(!$("#destination").val()){
        showError("#error-destination", "Destination is required");
        return false;
    }
    else
        hideErrorPanel("#error-destination");

    if(!$("#datepickerFrom").val()){
        showError("#error-datepickerFrom", "Check in date is required");
        return false;
    }
    else
        hideErrorPanel("#error-datepickerFrom");

    if(!$("#datepickerTo").val()){
        showError("#error-datepickerTo", "Check out date is required");
        return false;
    }
    else
        hideErrorPanel("#error-datepickerTo");

    if(!$("#guests").val()){
        showError("#error-guests", "Select number of guest");
        return false;
    }
    else
        hideErrorPanel("#error-guests");

    return true;
}

function sendPetition(){
    $("#loading").show();
    $("#complete-the-fields").hide();

    $("#hotel-container").html('');

    var formElement = document.getElementById("myFormElement");
    var xmlhttp = new XMLHttpRequest();

    var destination = $("#destination").val();
    var guests = $("#guests").val();
    var checkin = $("#datepickerFrom").val();
    var checkout = $("#datepickerTo").val();
    var param = "?destination="+destination+"&guests="+guests+"&checkin="+checkin+"&checkout="+checkout;

    xmlhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("hotel-container").innerHTML = this.responseText;
            $("#loading").hide();
        }
    }


    xmlhttp.open("GET", "vistas/Hoteles/listaHoteles.php"+param, true);
    xmlhttp.send();
}