$(window).scroll(function() {
  var $w = $(window),
    scroll_top = $w.scrollTop(),
    total_height = document.documentElement.scrollHeight,
    viewable_area = $w.height() - 94,
    scroll_percent = Math.floor((scroll_top + viewable_area) / total_height * 100);
  if (scroll_percent >= 25) {
    $('.anim-text-1').removeClass('none-display');
    $('.anim-text-1').addClass('animate__animated animate__bounceInRight');
    $('.up-anim').removeClass('none-display');
    $('.up-anim').addClass('animate__animated animate__fadeInUp animate__delay-1s');
    $('.down-anim').removeClass('none-display');
    $('.down-anim').addClass('animate__animated animate__fadeInDown animate__delay-1s');
  }
  if (scroll_percent >= 38) {
    $('.text-anim-2').removeClass('none-display');
    $('.text-anim-2').addClass('animate__animated animate__flash');
    $('.text-anim-3').removeClass('none-display');
    $('.text-anim-3').addClass('animate__animated animate__fadeInLeftBig animate__delay-1s');
    $('.text-anim-4').removeClass('none-display');
    $('.text-anim-4').addClass('animate__animated animate__fadeInLeftBig animate__delay-2s');
    $('.img-anim-1').removeClass('none-display');
    $('.img-anim-1').addClass('animate__animated animate__fadeInRightBig animate__delay-3s');
  }
  if (scroll_percent >= 54) {
    $('.data-anim').removeClass('none-display');
    $('.data-anim').addClass('animate__animated animate__heartBeat');
    $('.text-anim-5').removeClass('none-display');
    $('.text-anim-5').addClass('animate__animated animate__bounce');
  }
  if (scroll_percent >= 61) {
    $('.photo-anim').removeClass('none-display');
    $('.photo-anim').addClass('animate__animated animate__flipInY animate__delay-1s');
    $('.down-author').removeClass('none-display');
    $('.down-author').addClass('animate__animated animate__fadeInDown');
    $('.up-author').removeClass('none-display');
    $('.up-author').addClass('animate__animated animate__fadeInUp');
    $('.right-author').removeClass('none-display');
    $('.right-author').addClass('animate__animated animate__fadeInRight');
    $('.left-author').removeClass('none-display');
    $('.left-author').addClass('animate__animated animate__fadeInLeft');
    $('.text-anim-6').removeClass('none-display');
    $('.text-anim-6').addClass('animate__animated animate__zoomIn');
  }
  if (scroll_percent >= 73) {
    $('.img-anim-2').removeClass('none-display');
    $('.img-anim-2').addClass('animate__animated animate__backInLeft');
    $('.text-anim-7').removeClass('none-display');
    $('.text-anim-7').addClass('animate__animated animate__bounceInRight animate__delay-1s');
    $('.text-anim-8').removeClass('none-display');
    $('.text-anim-8').addClass('animate__animated animate__lightSpeedInRight animate__delay-2s');
    $('.email-anim').removeClass('none-display');
    $('.email-anim').addClass('animate__animated animate__fadeIn animate__delay-3s');
  }
});

function open_messenger() {
  document.getElementById("gray").style.display = "block";
  document.getElementById("chat-mess").style.display = "flex";
  $('body').css({
    'overflow': 'hidden'
  });
  $(document).bind('scroll', function() {
    window.scrollTo(0, 0);
  });
}
var request = new XMLHttpRequest();
var checked_id;
var id_user = <?php echo json_encode("$chat_user_id", JSON_HEX_TAG);?>;;

function send_message() {
  let message_val = $("#sendmes").val();
  data = "message=" + message_val + "&id_group=" + checked_id + "&id_user=" + id_user + "&date=2021-10-07 22:04:50";
  request.open("POST", "mess.php", true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(data);
  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
      show_chat(checked_id);
    }
  };
  $("#sendmes").val('');
}

function show_chat(clicked_id) {
  checked_id = clicked_id;
  data = "group_id=" + clicked_id;
  request.open("POST", "group.php", true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(data);
  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
      document.getElementById("place_for_message").innerHTML = "";
      var message = Array.from(JSON.parse(request.responseText));
      for (var i = 0; i < message.length; i++) {
        if (message[i]['id_user'] == id_user) {
          document.getElementById("place_for_message").innerHTML += '<div class="messages mine"><div class="message">' + message[i]['message'] + '</div></div>';
        } else {
          document.getElementById("place_for_message").innerHTML += '<div class="messages yours"><div class="message">' + message[i]['message'] + '</div></div>';
        }
      }
    }
  };
}
let timerId = setTimeout(function tick() {
  show_chat(checked_id);
  timerId = setTimeout(tick, 1000);
}, 1000);