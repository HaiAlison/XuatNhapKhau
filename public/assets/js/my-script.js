// tính amount
var unitPrice = parseFloat($("#unitPrice").val());
var qty = parseFloat($("#qty").val());
var cont = parseFloat($("#cont").val());
$('select').on('change',function(e){
      valService = e.target.value; //lấy value từ select qua sự kiện onchange
      calAmount(valService);
    })
function calAmount (val){
  if(val === 'tax'){   

    $("#taxLevel").prop( "disabled",false);
    $(".local").prop( "disabled",true);
    $("#taxLevel").on('keyup',function(){

      tax = parseFloat($(this).val());
      var result = unitPrice*qty*tax+unitPrice*qty*tax*0.1;
      amount = $("#amount").val(result);
    if($(this).val() === '')
      amount = $("#amount").prop('value',0);
    })

  }
  else if(val === 'localCharge'){
    $("#taxLevel").prop( "disabled",true);
    $(".local").prop( "disabled",false);
    $(".local").on('keyup', function() {
     var total = 0;
     $(".local").each(function(){
      var idHead = $(this).attr('id');
      if(idHead === 'docs')
        docs = parseFloat($(this).val());
      if(idHead === 'dthc')
        dthc = parseFloat($(this).val());
      if(idHead === 'cic')
        cic = parseFloat($(this).val());
      if(idHead === 'cleaning')
        cleaning = parseFloat($(this).val());
      if(idHead === 'other')
        other = parseFloat($(this).val());
      total = docs+(dthc+cic+cleaning+other)*cont;
      amount = $("#amount").val(total);
    })

   })

  }
  else amount = $("#amount").prop("value",'0');
}
$("#checkAll").click(function () {
  if ($("#checkAll").is(':checked')) {
    $(".po-checkbox").prop("checked", true);
  } else {
    $(".po-checkbox").prop("checked", false);
  }
});

$(".po-checkbox").click(function() {
      if (!$(this).prop("checked")) { //xài this để lấy  prop từng cái trong non arrow function
        $("#checkAll").prop("checked", false);
      }
    });

$("#checkSubAll").click(function () {
  if ($("#checkSubAll").is(':checked')) {
    $(".sub-po-checkbox").prop("checked", true);
  } else {
    $(".sub-po-checkbox").prop("checked", false);
  }
});
$(".sub-po-checkbox").click(function() {
      if (!$(this).prop("checked")) { //xài this để lấy  prop từng cái trong non arrow function
        $("#checkSubAll").prop("checked", false);
      }
    });

// -------------------------
// show po no, sub po 
$(document).ready(function(){
  $("#showToExport").on('click',function(){
    var values = {
      'start' : $("#start").val(),
      'end' : $("#end").val(),
    };

    $.ajax({
      type: "get",
      url: "/user/choose-date",
      data: {
        'start': $("#start").val(),
        'end': $("#end").val(),
      },
      success: function(result){
        if(result.data[0] !== undefined){
          $("#null").hide();
          $('.drop').show();
          $(".po_no").html(result.po);
          $(".sub_po").html(result.sub_po);

          $(".export-btn").css("display","block");
        }
        else{
          $("#null").show();
          $("#null").html('<div class="alert alert-danger">There is no Payment Local on this date</div>');
          $(".export-btn").css("display","none");

          $('.alert').delay(3000).fadeOut('slow');
          $(".drop").hide();

        }
      },
      error: function()
      {alert("Fail");}
    })
  })
})
//---------------------- 
// disabled, enable input type of service
var type = $("#inputTypeService").val();
calAmount(type);
if(type === 'tax'){
  $("#taxLevel").prop( "disabled",false);
}
else if(type === 'localCharge'){
  $(".local").prop( "disabled",false);
}
else{
  $("#taxLevel").prop( "disabled",true);
  $(".local").prop( "disabled",true);

}