$(document).ready(function() {
    $('.dropmenu li').click(function(e) {
        e.preventDefault();
    });
     
});
function activated(num){
    $('#liworker').removeClass('activated');
    $('#liobra').removeClass('activated');
    $('#liupload').removeClass('activated');
    $('#lidownload').removeClass('activated');
    $('#licard').removeClass('activated');
    $('#lisearch').removeClass('activated');
    if (num == 1) {
        $('#liworker').addClass('activated');
        $('.dropmenu #liworker ul').slideDown();
        $('.dropmenu #liobra ul').slideUp();
        $('.dropmenu #liupload ul').slideUp();
        $('.dropmenu #lidownload ul').slideUp();
        $('.dropmenu #licard ul').slideUp();
    }else if (num == 2) {
        $('#liobra').addClass('activated');
        $('.dropmenu #liobra ul').slideDown();
        $('.dropmenu #liworker ul').slideUp();
        $('.dropmenu #liupload ul').slideUp();
        $('.dropmenu #lidownload ul').slideUp();
        $('.dropmenu #licard ul').slideUp();
    }else if (num == 3) {
        $('#liupload').addClass('activated');
        $('.dropmenu #liupload ul').slideDown();
        $('.dropmenu #liobra ul').slideUp();
        $('.dropmenu #liworker ul').slideUp();
        $('.dropmenu #lidownload ul').slideUp();
        $('.dropmenu #licard ul').slideUp();
    }else if (num == 4) {
        $('#lidownload').addClass('activated');
        $('.dropmenu #lidownload ul').slideDown();
        $('.dropmenu #liupload ul').slideUp();
        $('.dropmenu #liobra ul').slideUp();
        $('.dropmenu #liworker ul').slideUp();
        $('.dropmenu #licard ul').slideUp();
    }else if (num == 5) {
        $('#licard').addClass('activated');
        $('.dropmenu #licard ul').slideDown();
        $('.dropmenu #lidownload ul').slideUp();
        $('.dropmenu #liupload ul').slideUp();
        $('.dropmenu #liobra ul').slideUp();
        $('.dropmenu #liworker ul').slideUp();
    }else if (num == 6) {
        $('#lisearch').addClass('activated');
        $('.dropmenu #licard ul').slideUp();
        $('.dropmenu #lidownload ul').slideUp();
        $('.dropmenu #liupload ul').slideUp();
        $('.dropmenu #liobra ul').slideUp();
        $('.dropmenu #liworker ul').slideUp();
        
    }
}
function messageModal() {
    dialog2 = $("#dialog").dialog({
        autoOpen: false,
        height: 200,
        width: 300,
        modal: true,
        dialogClass: 'no-close success-dialog',
        buttons: {
            OK: function () {
                dialog2.dialog("close");
            }
        },
    });
}
function numberValidation(event) {
    if ((event.keyCode < 48) || (event.keyCode > 57))
        event.returnValue = false;
}
function yearValidation() {
    var fecha = new Date();
    var ano = fecha.getFullYear();
    var year = $("#year").val();
    if (year < 1985 || year > ano) {
        alert("Año invalido! Ingreselo nuevamente!");
        $("#year").val("");
    }
}
function login() {
    $.post(
        base_url + "controller/conection",
        {
            user: $("#user").val(),
            password: $("#password").val()
        },
        function () {
            validate();
        }
        );
}
function validate() {
    $.post(
        base_url + "controller/validateSession",
        {},
        function (data) {
            if (data.condition == true) {
                loadSystem();
            } else {
                messageModal();
                dialog2.dialog("open");
            }
        }, 'json'
        );
}
function loadSystem() {
    $.post(
        base_url + "controller/loadSystem",
        {},
        function (pagina) {
            $("body").html(pagina);
        }
        );
}
function cookieCheck() {
    $.post(
        base_url + "controller/cookieCheck",
        {},
        function (data) {
            if (data.condition) {
                loadSystem();
            }
        }, 'json'
        );
}
function killCookie() {
    $.post(
        base_url + "controller/killCookie",
        {},
        function () {
            loadSystem();
        }
        );
    $("#user").val("");
    $("#password").val("");
}
function loadFile() {
    $.post(
        base_url + "controller/loadFile",
        {},
        function (pagina, data) {
            $("#container").html(pagina, data);
        }
        );
}
function searchFile() {
    $.post(
        base_url + "controller/searchFile",
        {},
        function (pagina, data) {
            $("#container").html(pagina, data);
        }
        );
    document.getElementById("btSearchFile").className = "btn btn-primary btn-lg btn-block";
    document.getElementById("btAddObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditObra").className = "btn btn-default btn-lg btn-block";
    document.getElementById("btShowEditWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btNewWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchFileWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowCreateCard").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchReg").className = "btn btn-default btn-sm btn-block";
}
function addObra() {
    $.post(
        base_url + "controller/addObra",
        {},
        function (pagina, data) {
            $("#container").html(pagina, data);
        }
        );
    document.getElementById("btAddObra").className = "btn btn-primary btn-lg btn-block";
    document.getElementById("btShowUploadObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btSearchFile").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditObra").className = "btn btn-default btn-lg btn-block";
    document.getElementById("btNewWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchFileWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowCreateCard").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchReg").className = "btn btn-default btn-sm btn-block";
}
function saveObra() {
    if ($("#nombreObra").val() == "") {
        alert("Debe ingresar una obra!");
    } else {
        $.post(
            base_url + "controller/saveObra",
            {
                nombreObra: $("#nombreObra").val()

            },
            function (data) {
                if (data.message == "existe") {
                    alert("La obra ya existe en el sistema!");
                    $("#nombreObra").val("");
                } else if (data.message == "error") {
                    alert("Error al guardar!");
                    $("#nombreObra").val("");
                } else if (data.message == "correcto") {
                    addObra();
                    alert("Obra agregada correctamente!");
                    $("#nombreObra").val("");
                }
            }, 'json'
            );
    }
}
function showUploadObra() {
    $.post(
        base_url + "controller/showUploadObra",
        {},
        function (pagina, data) {
            $("#container").html(pagina, data);
        }
        );
    document.getElementById("btShowUploadObra").className = "btn btn-primary btn-lg btn-block";
    document.getElementById("btAddObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btSearchFile").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditObra").className = "btn btn-default btn-lg btn-block";
    document.getElementById("btShowEditWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btNewWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchFileWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowCreateCard").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchReg").className = "btn btn-default btn-sm btn-block";
}
function datePicker1() {
    $("#datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        minDate: '-80Y',
        dateFormat: 'dd-mm-yy',
        maxDate: "-18Y",
        yearRange: "-80:+0"
    });
}
function showFiles() {
    if ($("#nameObra").val() == "" || $("#year").val() == "" || $("#cat").val() == "") {
        alert("Debe rellenar los campos requeridos!");
    } else {
        $.post(
            base_url + "controller/showFiles",
            {
                obra: $("#nameObra").val(),
                year: $("#year").val(),
                cat: $("#cat").val()
            },
            function (pagina, data) {
                $("#showFiles2").html(pagina, data);
            }
            );
    }

}
function showFilesWorker() {
    if ($("#obra").val() == "" || $("#rut").val() == "" ) {
        alert("Debe rellenar los campos requeridos!");
    } else {
        $.post(
            base_url + "controller/showFilesWorker",
            {
                obra: $("#obra").val(),
                rut: $("#rut").val()
            },
            function (pagina, data) {
                $("#showFiles2").html(pagina, data);
            }
            );
    }

}
function showNewWorker() {
    $.post(
        base_url + "controller/showNewWorker",
        {},
        function (pagina) {
            $("#container").html(pagina);
        }
        );
    document.getElementById("btNewWorker").className = "btn btn-primary btn-lg btn-block";
    document.getElementById("btAddObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditObra").className = "btn btn-default btn-lg btn-block";
    document.getElementById("btShowEditWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btSearchFile").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchFileWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowCreateCard").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchReg").className = "btn btn-default btn-sm btn-block";

}
function showEditWorker() {
    $.post(
        base_url + "controller/showEditWorker",
        {},
        function (pagina, data) {
            $("#container").html(pagina, data);
        }
        );
    document.getElementById("btNewWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditWorker").className = "btn btn-primary btn-lg btn-block";
    document.getElementById("btAddObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditObra").className = "btn btn-default btn-lg btn-block";
    document.getElementById("btShowUploadObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btSearchFile").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchFileWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowCreateCard").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchReg").className = "btn btn-default btn-sm btn-block";

}
function editWorkerRut(modal){
    $.post(
        base_url + "controller/editWorkerRut",{
        },function(){
            $("#editWorkerModal"+modal).modal("show");
        });
}
function editWorkerUpdate(modal){
    $.post(
        base_url + "controller/editWorkerUpdate",{
            rut : $("#inRutWorker"+modal).val(),
            nombre : $("#inNameWorker"+modal).val(),
            apellido_paterno : $("#inApellidoPaterno"+modal).val(),
            apellido_materno : $("#inApellidoMaterno"+modal).val()
        },function(){
            $("#editWorkerModal"+modal).modal("toggle");
            setTimeout("showEditWorker();", 1000);
            
        });
}
function editObra(modal){
    $("#editObraModal"+modal).modal("show");
}
function editObraId(id,modal){
    $.post(
        base_url + "controller/editObraId",{
            id_obra : id,
            nombre_obra : $("#inNameObra"+modal).val()
        },function(){
            $("#editObraModal"+modal).modal("toggle");
            setTimeout("showEditObra();", 1000);
        });
}
function showEditObra() {
    $.post(
        base_url + "controller/showEditObra",{},
        function (pagina, data) {
            $("#container").html(pagina, data);
        }
        );
    document.getElementById("btNewWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditWorker").className = "btn btn-default btn-lg btn-block";
    document.getElementById("btShowEditObra").className = "btn btn-primary btn-lg btn-block";
    document.getElementById("btAddObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btSearchFile").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchFileWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowCreateCard").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchReg").className = "btn btn-default btn-sm btn-block";

}

function deleteObra(id_obra){
    $.post(
        base_url + "controller/deleteObra",{id_obra : id_obra},
        function(){
            showEditObra();
        });
}

function showEditCard(){
    $.post(
        base_url + "controller/showEditCard",
        {},
        function (pagina, data){ 
            $("#container").html(pagina, data);
        }
    );
    document.getElementById("btNewWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btAddObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btSearchFile").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchFileWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowCreateCard").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditCard").className = "btn btn-primary btn-sm btn-block";
    document.getElementById("btShowSearchReg").className = "btn btn-default btn-sm btn-block";

}

function deleteCard(id_tarjeta){
    $.post(base_url + "controller/deleteCard",{id_tarjeta: id_tarjeta},
          function(){
        showEditCard();
    });
}

function deleteWorker(rut){
  $.post(base_url + "controller/deleteWorker",{rut : rut},
          function (){
        showEditWorker();
    });
}

function showUploadWorker() {
    $.post(
        base_url + "controller/showUploadWorker",
        {},
        function (pagina, data, data2) {
            $("#container").html(pagina, data);
        }
        );
    document.getElementById("btShowUploadWorker").className = "btn btn-primary btn-lg btn-block";
    document.getElementById("btNewWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditObra").className = "btn btn-default btn-lg btn-block";
    document.getElementById("btAddObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btSearchFile").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchFileWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowCreateCard").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchReg").className = "btn btn-default btn-sm btn-block";

}
function rutValidation() {
    if ((event.keyCode == 107)) {
        event.returnValue = true;
    } else {
        if ((event.keyCode < 48) || (event.keyCode > 57))
            event.returnValue = false;
    }
}

function searchState() {
    $.post(
        base_url + "controller/searchState",
        {
            worker: $("#worker").val(),
            obra: $("#obra").val()
        },
        function (data) {
            if (data.condition == false) {
                document.getElementById('workerState').style.display = 'block';
            }
        }, 'json'
        );
}
function showSearchFileWorker() {
    $.post(
        base_url + "controller/showSearchFileWorker",
        {},
        function (pagina, data) {
            $("#container").html(pagina, data);
        }
        );
    document.getElementById("btShowSearchFileWorker").className = "btn btn-primary btn-lg btn-block";
    document.getElementById("btSearchFile").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btAddObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btNewWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditObra").className = "btn btn-default btn-lg btn-block";
    document.getElementById("btShowEditWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowCreateCard").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchReg").className = "btn btn-default btn-sm btn-block";

}
function showCreateCard() {
    $.post(
        base_url + "controller/showCreateCard",
        {},
        function (pagina) {
            $("#container").html(pagina);
        }
        );
    document.getElementById("btShowCreateCard").className = "btn btn-primary btn-lg btn-block";
    document.getElementById("btSearchFile").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btAddObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditObra").className = "btn btn-default btn-lg btn-block";
    document.getElementById("btShowEditWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btNewWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchFileWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchReg").className = "btn btn-default btn-sm btn-block";
}
function showSearchReg() {
    activated(6);
    $.post(
        base_url + "controller/showSearchReg",
        {},
        function (pagina) {
            $("#container").html(pagina);
        }
        );
    document.getElementById("btShowSearchReg").className = "btn btn-primary btn-lg btn-block";
    document.getElementById("btShowCreateCard").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btSearchFile").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btAddObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowEditObra").className = "btn btn-default btn-lg btn-block";
    document.getElementById("btShowUploadObra").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btNewWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowUploadWorker").className = "btn btn-default btn-sm btn-block";
    document.getElementById("btShowSearchFileWorker").className = "btn btn-default btn-sm btn-block";


}
function saveCard(){
    if($("#slCC").val() !== "" && $("#idCC").val() !== "" && $("#idobra").val() !== ""){
        $.post(
            base_url + "controller/saveCard",
            {
                rut:$("#slCC").val(),
                id:$("#idCC").val(),
                obra:$("#idobra").val()
            },
            function (data) {
                if(data.condition){
                    alert("Agregada correctamente!");
                    $("#slCC").val("");
                    $("#idCC").val("");
                    $("#idobra").val("");
                }else{
                    alert("Error!");
                }

            }, 'json'
            );}else{
            alert("¡Ingrese los campos requeridos!");
        }
    }
    function loadMonths(){
        year = $("#slaño").val();
        $.post(
            base_url + "controller/loadMonths",
            {
              year:year
          },
          function (pagina) {
            $("#meses").html(pagina);
        }
        );
    }
    function loadAS(){
        obra = $("#slobra").val();
        year = $("#slaño").val();
        month = $("#slmes").val();
        $.post(
            base_url + "controller/loadAS",
            {
              year:year ,
              obra:obra,
              month:month
          },
          function (pagina) {
            $("#aCont").html(pagina);
        }
        );
    }
    function showDet(r){
    rut = r;
    obra = $("#slobra").val();
    year = $("#slaño").val();
    month = $("#slmes").val();
    $.post(
            base_url + "controller/showDet",
            {
              year:year ,
              obra:obra,
              month:month,
              rut: rut
            },
            function (pagina) {
            $('#ModalWorkerD').modal('show');    
            $("#wdetailc").html(pagina);
            }
    );
}

function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";
       tecla_especial = false;
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
}
function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    if (key == 8) {
        return key;
    }else{
    return (key >= 48 && key <= 57)}
}
function formVal(){
    if ($("#fObra").val()!="" && $("#fCat").val()!="" && $("#fyear").val()!="" && $("#fMonth").val()!="" && $("#farchivo").val()!="") {
        document.formObra.submit();
    }else{
        alert("¡Ingrese todos los campos!")
    }
}
function formWVal(){
    if ($("#workerName").val()!="") {
        alert("hola");
    }
}
