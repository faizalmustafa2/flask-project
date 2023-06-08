<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="/static/services/bot.png">
  <title>SwakalaBot</title>
  <meta name="description" content="Chatbot Hygiea">
  <meta name="keywords" content="sedia membantu dalam segala hal tentang Sexual harrasment">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="static/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

  <section class="msger">
    <!-- / banner -->
    <!--about-->

    <header class="msger-header">

      <div class="msger-header-title">
        <a style="margin-right: 100%;" href="/"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></i> Chatbot Swakala </i>
      </div>
    </header>

    <main class="msger-chat">
      <div class="msg left-msg">
        <!-- <div class="msg-img" style="background-image: url({{ url_for('static', filename='img/services/cb.png') }})"></div> -->

        <div class="msg-bubble">
          <div class="msg-info">
            <div class="msg-info-name">Swakala Bot</div>
            <div class="msg-info-time"></div>
          </div>

          <div class="msg-text">
            Selamat Datang di SwakalaBot, SwakalaBot merupakan sebuah websitechatbot yang bisa membantu anak agar mereka
            punya tempat untuk bercerita tentang hal sulit yang mereka lalui, di aplikasi ini kami bisa memberikan
            solusi yang terbaik untuk anak dan jika kekerasan yang menimpa sang anak sangat fatal kita bisa menyarankan
            mereka untuk melapor ke pihak yang menangani masalah kekerasan anak.
          </div>
        </div>
      </div>

    </main>

    <form class="msger-inputarea">
      <input type="text" class="msger-input" id="textInput" placeholder="Enter your message." autocomplete="off">
      <button type="submit" class="msger-send-btn">Send</button>
    </form>
  </section>
  <!-- partial -->
  <script src='https://use.fontawesome.com/releases/v5.0.13/js/all.js'></script>
  <script>
    const msgerForm = get(".msger-inputarea");
    const msgerInput = get(".msger-input");
    const msgerChat = get(".msger-chat");


    // Icons made by Freepik from www.flaticon.com
    const BOT_IMG = "{{ url_for('static', filename='img/services/bot.png') }}";
    const PERSON_IMG = "{{url_for('static', filename='img/services/bot.png') }}";
    const BOT_NAME = "  Swakala Bot";
    const PERSON_NAME = "You";

    msgerForm.addEventListener("submit", event => {
      event.preventDefault();

      const msgText = msgerInput.value;
      if (!msgText) return;

      appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
      msgerInput.value = "";
      botResponse(msgText);
    });

    function appendMessage(name, img, side, text) {
      //   Simple solution for small apps
      const msgHTML = `
<div class="msg ${side}-msg">
  <div class="msg-img" style="background-image: url(${img})"></div>
  <div class="msg-bubble">
    <div class="msg-info">
      <div class="msg-info-name">${name}</div>
      <div class="msg-info-time">${formatDate(new Date())}</div>
    </div>
    <div class="msg-text">${text}</div>
  </div>
</div>
`;

      msgerChat.insertAdjacentHTML("beforeend", msgHTML);
      msgerChat.scrollTop += 500;
    }

    function botResponse(rawText) {

      // Bot Response
      $.get("/get", {
        msg: rawText
      }).done(function(data) {
        console.log(rawText);
        console.log(data);
        const msgText = data;
        appendMessage(BOT_NAME, BOT_IMG, "left", msgText);

      });

    }


    // Utils
    function get(selector, root = document) {
      return root.querySelector(selector);
    }

    function formatDate(date) {
      const h = "0" + date.getHours();
      const m = "0" + date.getMinutes();

      return `${h.slice(-2)}:${m.slice(-2)}`;
    }
  </script>

</body>

</html>