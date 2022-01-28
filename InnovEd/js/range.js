function clone(clicked_id) {
    var id_q = new Date().getTime();
    $('<div class="question_block animate__animated animate__backInRight" id="question_'+id_q+'_part" > <div class="row"> <div class="col-lg-8 col-md-12"> <div class="question"> <div class="form__group field"> <input type="input" class="form__field" placeholder="Питання" name="question[]" id="name'+id_q+'" onkeypress="return isNumberKey(event)" maxlength="300" required /> <label for="name'+id_q+'" class="form__label">Введіть питання</label> </div> </div> <input type="number" name="quet_num[]" id="quet_num'+id_q+'" value="1" hidden> <div id="quest'+id_q+'_before"> <div class="answers"> <div id="quest'+id_q+'"> <label class="rad-label" id="ans'+id_q+'"> <input type="checkbox" class="rad-input" value="true" name="check_answer[]" id="checkbox'+id_q+'"> <div class="rad-design"></div> <input type="text" name="answer[]" value="Варіант відповіді" class="rad-text" onkeypress="return isNumberKey(event)" maxlength="100" required/> <input type="file" id="imgupload'+id_q+'" name="answer_photo[]" onChange="img_pathUrl(this);" hidden/> <i class="material-icons" id="image'+id_q+'" onclick="get_image(this.id); open_image(this.id);">image</i> </label><div class="ans-img" id="out_block'+id_q+'"> <i class="material-icons btn-cl" id="del_image'+id_q+'" onclick="del_image(this.id);"> close </i> <img id="output'+id_q+'" class="answer_image"> </div> </div> <label class="rad-label" id="'+id_q+'" onclick="add_ans(this.id);"> <div class="rad-text">Додати варіант відповіді</div> </label> </div> </div> </div> <div class="col-lg-4 col-md-12"> <div class="row"> <div class="form-group" name="class_of" form="test" style="text-align: center; display: block; margin-left: auto; margin-right: auto;"> <select class="form-control select-dark" id="const_'+id_q+'" onchange="type_q(this.id);" name="q_type[]"> <option disabled class="option-dark">Тип питання:</option> <option class="option-dark" selected>Вибір з множини</option> <option class="option-dark">Відкрита відповідь</option> <option class="option-dark">Вибір відповідності</option> <option class="option-dark">Есе (відповідь з поясненнями)</option></select> </div> </div> <div class="file-input"> <div class="form-group"> <label class="label"> <i class="material-icons" id="photo'+id_q+'">attach_file</i> <span class="title">Прикріпити додаткове фото</span> <input type="file" id="photo_of_the_question'+id_q+'" name="photo_of_the_question[]" onChange="photo_quest(this.id);" accept=".jpg, .jpeg, .png"> </label> </div> </div> <div class="row" style="padding-bottom: 20px;"> <div class="col-6"> <i class="material-icons iconjust" id="'+id_q+'" onclick="clone(this.id);"> post_add </i> </div><div class="col-6"> <i class="material-icons iconjust" id="'+id_q+'" onclick="del(this.id);"> delete </i> </div></div> </div> </div> </div> </div>').insertAfter('#question_'+clicked_id+'_part');
}
function del(clicked_id) {
    var d = document.getElementById("question_"+clicked_id+"_part");
    d.className -= " animate__animated animate__backInRight"; 
    d.className += " animate__animated animate__backOutLeft";
    setTimeout(function(){
        $('#question_'+clicked_id+'_part').remove();
    }, 700);
}
function add_ans(clicked_id) {
    let ans_nums = $("#quet_num"+clicked_id).val();
    let iddiv = clicked_id;
    let ans_num = parseInt(ans_nums);
    $("#quet_num"+clicked_id).val(ans_num+1);
    var id_a = new Date().getTime();
    $('<label class="rad-label animate__animated animate__fadeInLeft" id="ans'+id_a+'"> <input type="checkbox" id="checkbox'+id_a+'" class="rad-input" name="check_answer[]" value="true"> <div class="rad-design"></div> <input type="text" name="answer[]" value="Варіант відповіді" class="rad-text" onkeypress="return isNumberKey(event)" maxlength="100" required/> <input type="file" id="imgupload'+id_a+'" name="answer_photo[]" onChange="img_pathUrl(this);" hidden/> <i class="material-icons" id="image'+id_a+'" onclick="get_image(this.id); open_image(this.id);">image</i> <i id="'+iddiv+'" class="fa fa-1x remove-position" onclick="show_inp(this.id);"> <i class="fa fa-times remove-delete" aria-hidden="true" id="'+id_a+'" onclick="del_ans(this.id);"></i> </i> </label><div class="ans-img" id="out_block'+id_a+'"> <i class="material-icons btn-cl" id="del_image'+id_a+'" onclick="del_image(this.id);"> close </i> <img id="output'+id_a+'" class="answer_image"> </div> ').appendTo('#quest'+clicked_id+'');
    }
    function add_сonnect(clicked_id) {
    let ans_nums = $("#quet_num"+clicked_id).val();
    let iddiv = clicked_id;
    let ans_num = parseInt(ans_nums);
    $("#quet_num"+clicked_id).val(ans_num+1);
    var id_a = new Date().getTime();
    $('<label class="rad-label animate__animated animate__fadeInLeft" id="ans'+id_a+'"> <div class="row"> <div class="col-4"> <input type="text" name="prompt[]" value="Підказка" class="rad-text" onkeypress="return isNumberKey(event)" maxlength="100" required/> </div> <div class="col-4" style="text-align: center;"><i class="fa fa-arrows-h arrow-tool fa-2x" aria-hidden="true"></i> </div> <div class="col-4"> <input type="text" name="answer[]" value="Відповідь" class="rad-text" onkeypress="return isNumberKey(event)" maxlength="100" required/> </div> </div> <i id="'+iddiv+'" class="fa fa-1x" onclick="show_inp(this.id);" style="margin-left:auto;"> <i class="fa fa-times remove-delete" aria-hidden="true" id="'+id_a+'" onclick="del_ans(this.id);"></i> </i> </label>').appendTo('#quest'+clicked_id+'');
    }      
    var quest_time;
    function show_inp(clicked_id) {
        quest_time = clicked_id;
        let ans_nums = $("#quet_num"+quest_time).val();
        let ans_num = parseInt(ans_nums);
        $("#quet_num"+quest_time).val(ans_num-1);
    }
    function del_ans(clicked_id) {
    $('#ans'+clicked_id+'').addClass( "animate__animated animate__pulse" );
    $('#ans'+clicked_id+'').remove();
    $('#out_block'+clicked_id+'').remove();
}
function type_q(selected_id)
{
    var select = document.getElementById(''+selected_id+'');
    var value_ok = select.options[select.selectedIndex].value;
    var select_id = selected_id.replace('const_', '');
    $("#quet_num"+select_id).val(1);
    if(value_ok=="Есе (відповідь з поясненнями)")
    {   
        document.getElementById("quest"+select_id+"_before").innerHTML = "<textarea class='animate__animated animate__fadeIn' maxlength='2000' name='answer[]' required>Інструкція до написання розгорнутої відповіді</textarea>";
    }
    else if(value_ok=="Вибір з множини")
    {
        let iddiv = select_id;  
        var id_a = new Date().getTime();
        document.getElementById("quest"+select_id+"_before").innerHTML = '<div class="answers animate__animated animate__fadeIn"> <div id="quest'+iddiv+'"> <label class="rad-label" id="ans'+id_a+'"> <input type="checkbox" class="rad-input" name="check_answer[]" id="checkbox'+id_a+'"> <div class="rad-design"></div> <input type="text" name="answer[]" value="Варіант відповіді" class="rad-text" onkeypress="return isNumberKey(event)" maxlength="100" required/> <input type="file" id="imgupload'+id_a+'" name="answer_photo[]" onChange="img_pathUrl(this);" hidden/> <i class="material-icons" id="image'+id_a+'" onclick="get_image(this.id); open_image(this.id);">image</i></label><div class="ans-img" id="out_block'+id_a+'"> <i class="material-icons btn-cl" id="del_image'+id_a+'" onclick="del_image(this.id);"> close </i> <img id="output'+id_a+'" class="answer_image"> </div> </div> <label class="rad-label" id="'+iddiv+'" onclick="add_ans(this.id);"> <div class="rad-text">Додати варіант відповіді</div></label> ';
    }
    else if(value_ok=="Відкрита відповідь")
    {
        document.getElementById("quest"+select_id+"_before").innerHTML = "<input placeholder='Запишіть усі відповіді через ;' type='text' class='input-area animate__animated animate__fadeIn' name='answer[]' onkeypress='return isNumberKey(event)' maxlength='60' required>";
    } 
    else if(value_ok=="Вибір відповідності")
    {
        let iddiv = select_id;  
        var id_a = new Date().getTime();
        document.getElementById("quest"+select_id+"_before").innerHTML = '<div class="answers animate__animated animate__fadeIn"> <div id="quest'+iddiv+'"> <label class="rad-label" id="ans'+id_a+'"><div class="row"><div class="col-4"><input type="text" name="prompt[]" value="Підказка" class="rad-text" onkeypress="return isNumberKey(event)" maxlength="100" required/></div><div class="col-4" style="text-align: center;"><i class="fa fa-arrows-h arrow-tool fa-2x" aria-hidden="true"></i></div><div class="col-4" style="text-align: center;"><input type="text" name="answer[]" value="Відповідь" class="rad-text" onkeypress="return isNumberKey(event)" maxlength="100" required/></div></div></label> </div> <label class="rad-label" id="'+iddiv+'" onclick="add_сonnect(this.id);"> <div class="rad-text">Додати співвідношення</div> </label> </div></div>';
    }      
} 
    function photo_quest(selecte_id){
    var photo_q = selecte_id.replace('photo_of_the_question', '');
    if(document.getElementById(""+selecte_id+"").files.length != 0){
        $("#photo"+photo_q).html("image");
    } 
    else {
        $("#photo"+photo_q ).html("attach_file");
    }
  }
  function open_image(selected_id)
  {
    var select_id = selected_id.replace('image', '');
    $('#imgupload'+select_id).trigger('click');
}
var photo_time;
function get_image(selected_id)
{
     photo_time = selected_id.replace('image', '');
}
function del_image(selected_id)
{
     var image_p = selected_id.replace('del_image', '');
     $('#output'+image_p)[0].src = "";
    $('#out_block'+image_p).hide();
    $("#imgupload"+image_p).val('');
}
function img_pathUrl(input){
    if ($(input).get(0).files.length === 0)
    {
        $('#output'+photo_time)[0].src = "";
        $('#out_block'+photo_time).hide();
    }
   else
   {
        $('#out_block'+photo_time).show();
        $('#output'+photo_time)[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
   }
}
$("form").submit(function () {

    var this_master = $(this);

    this_master.find('input[type="checkbox"]').each( function () {
        var checkbox_this = $(this);


        if( checkbox_this.is(":checked") == true ) {
            checkbox_this.attr('value','true');
        } else {
            checkbox_this.prop('checked',true);
            //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA    
            checkbox_this.attr('value','false');
        }
    })
})
function chooseback(selected_id)
{
$("#background_photo").val(selected_id);
$("#one").removeClass("highlited_check");
$("#two").removeClass("highlited_check");
$("#three").removeClass("highlited_check");
$("#four").removeClass("highlited_check");
$("#"+selected_id).addClass("highlited_check");
}