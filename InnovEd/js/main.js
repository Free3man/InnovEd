

'use strict';

(function($) {

	/*------------------
		Background Set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});
	/*------------------
		Accordions
	--------------------*/
	$('.panel-link').on('click', function (e) {
		$('.panel-link').removeClass('active');
		var $this = $(this);
		if (!$this.hasClass('active')) {
			$this.addClass('active');
		}
		e.preventDefault();
	});


	/*------------------
		Circle progress
	--------------------*/
	$('.circle-progress').each(function() {
		var cpvalue = $(this).data("cpvalue");
		var cpcolor = $(this).data("cpcolor");
		var cptitle = $(this).data("cptitle");
		var cpid 	= $(this).data("cpid");

		$(this).append('<div class="'+ cpid +'"></div><div class="progress-info"><h2>'+ cpvalue +'%</h2><p>'+ cptitle +'</p></div>');

		if (cpvalue < 100) {

			$('.' + cpid).circleProgress({
				value: '0.' + cpvalue,
				size: 211,
				thickness: 5,
				fill: cpcolor,
				emptyFill: "rgba(0, 0, 0, 0)"
			});
		} else {
			$('.' + cpid).circleProgress({
				value: 1,
				size: 211,
				thickness: 5,
				fill: cpcolor,
				emptyFill: "rgba(0, 0, 0, 0)"
			});
		}
	});

})(jQuery);
/* При клике показываем или скрываем кнопки мессенджеров */

var menuBtn = $('.messenger-btn'),
menu = $('.messenger-links');
menuBtn.on('click', function() {
if ( menu.hasClass('show') ) {
menu.removeClass('show');
} else {
menu.addClass('show');
}
});

/*  Скрыть div при клике в любом месте сайта кроме самого div */

$(document).mouseup(function (e){
var div = $('.messenger');
if (!div.is(e.target)
&& div.has(e.target).length === 0) {
$('.messenger-links').removeClass('show');
}
});
var Boxlayout = (function () {
	var wrapper = document.body,
	  sections = Array.from(document.querySelectorAll(".section")),
	  closeButtons = Array.from(document.querySelectorAll(".close-section")),
	  expandedClass = "is-expanded",
	  hasExpandedClass = "has-expanded-item";
  
	return { init: init };
  
	function init() {
	  _initEvents();
	}
  
	function _initEvents() {
	  sections.forEach(function (element) {
		element.onclick = function () {
		  _openSection(this);
		};
	  });
	  closeButtons.forEach(function (element) {
		element.onclick = function (element) {
		  element.stopPropagation();
		  _closeSection(this.parentElement);
		};
	  });
	}
  
	function _openSection(element) {
	  if (!element.classList.contains(expandedClass)) {
		element.classList.add(expandedClass);
		wrapper.classList.add(hasExpandedClass);
	  }
	}
  
	function _closeSection(element) {
	  if (element.classList.contains(expandedClass)) {
		element.classList.remove(expandedClass);
		wrapper.classList.remove(hasExpandedClass);
	  }
	}
  })();
  
  Boxlayout.init();
  
  function course_block()
  {
	$(".course-menu").show();
	$("#gray").show();
  }
  function close_course_block()
  {
	$(".course-menu").css( "display", "none" );
	$("#gray").css( "display", "none" );
  }
  function change()
  {
	if(file_p==0)
	{
		document.write("<i class='material-icons'>attach_file</i>");
	}
	else
	{
		document.write("<i class='material-icons'>image</i>");
	}
};

var request = new XMLHttpRequest();
var data;

// Regestration and Authification HTTP requests 
	function get_user()
	{
		let email = $("#email_auth").val();
		let password = $("#pass_auth").val();
		data = "email="+email+"&password="+password;
        request.open("POST", "form.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send(data);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) 
            {
				let results = JSON.parse(request.responseText);
                if(results['email']!=true)
				{
					$("#email_auth").addClass("non-valid");
					$("<span class='wartext' id='email_auth_valid'>Email адреса не знайдена</span>").appendTo($("#email_block_auth"));
				}
				if(results['password']!=true)
				{
					$("#pass_auth").addClass("non-valid");
					$("<span class='wartext' id='pass_auth_valid'>Пароль невірний</span>").appendTo($("#pass_block_auth"));
				}
				if((results['password']==true)&&(results['email']==true))
				{
					window.location.reload();
				}
	        }
	    };
	}
	function add_user()
	{
		let email = $("#email_reg").val();
		let surname = $("#surname_reg").val();
		let name = $("#name_reg").val();
		let patronymic = $("#patronymic_reg").val();
		let password = $("#password_reg").val();
		let birth_date = $("#birth_reg").val();
		let form = $("#form_reg").val();
		let status = $('input[name="status"]:checked').val();
		data = "surname="+surname+"&name="+name+"&patronymic="+patronymic+"&password="+password+"&birth_date="+birth_date+"&form="+form+"&email="+email+"&status="+status;
		request.open("POST", "form.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send(data);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) 
            {
				document.getElementById("i_a_i").innerHTML = request.responseText;
                if(request.responseText == 1)
				{
					$("#email_reg").addClass("non-valid");
					$("<span class='wartext' id='email_reg_valid'>Така email адреса вже зайнята</span>").appendTo($("#email_block_reg"));
				}
				else
				{
					window.location.reload();
				}
	        }
	    };  
	}
	var pass_input = document.getElementById("password_reg");
	var capital = document.getElementById("capital");
	var number = document.getElementById("number");
	var length = document.getElementById("length");
	pass_input.onkeyup = function() {
  		// Validate capital letters
  		var upperCaseLetters = /[A-Z]/g;
  		if(pass_input.value.match(upperCaseLetters)) {
    		capital.classList.remove("invalid");
    		capital.classList.add("valid");
  		} else {
    		capital.classList.remove("valid");
    		capital.classList.add("invalid");
  		}
		 // Validate numbers
  		var numbers = /[0-9]/g;
  		if(pass_input.value.match(numbers)) {
   		 	number.classList.remove("invalid");
    		number.classList.add("valid");
  		} else {
    		number.classList.remove("valid");
    		number.classList.add("invalid");
  		}
		// Validate length
  		if(pass_input.value.length >= 8) {
    		length.classList.remove("invalid");
   			length.classList.add("valid");
  		} else {
    		length.classList.remove("valid");
    		length.classList.add("invalid");
  		}
	}
	$("#email_auth").on("keyup", function() {
		$("#email_auth").removeClass("non-valid");
		$("#email_auth_valid").remove();
	});
	$("#pass_auth").on("keyup", function() {
		$("#pass_auth").removeClass("non-valid");
		$("#pass_auth_valid").remove();
	});
	$("#email_reg").on("keyup", function() {
		$("#email_reg").removeClass("non-valid");
		$("#email_reg_valid").remove();
	});
	var toggle=0;
$(".roll-up-menu").click(function() {
	if(toggle==0)
	{
		$('.menu.icon.down').addClass('active');
  		$('.menu.icon.center').addClass('active');
 		$('.menu.icon.up').addClass('active');
		$('.main-menu-mobile').addClass('active');
		toggle=1;
	}
	else if(toggle==1)
	{
		$('.menu.icon.down').removeClass('active');
  		$('.menu.icon.center').removeClass('active');
 		$('.menu.icon.up').removeClass('active');
		$('.main-menu-mobile').removeClass('active');
		toggle=0;
	}
});