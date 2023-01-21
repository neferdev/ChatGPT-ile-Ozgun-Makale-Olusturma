
<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>ChatGPT ile Özgün Makale Oluşturma</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

  <!-- Bootstrap core CSS -->


  <!-- Custom styles for this template -->
  <link href="makale.css" rel="stylesheet">
</head>
<div id='loader'></div>
<body class="text-center">
  <form class="form-signin" id='ozgunmakale'>
    <img class="mb-4" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUJYY7BKBef4OifowLzpJxpAyh-C2-MFrVPerJ_2k&s" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">ChatGPT ile Özgün Makale Oluşturma</h1>
    <label for="inputEmail" class="sr-only">Makale Kategorileri</label>
    <select id='category' name='category' class='form-control'>
      <option>Kategori Seçiniz</option>
      <option id='Sağlık'>Sağlık</option>
      <option id='Spor'>Spor</option>
      <option id='Fitness'>Fitness</option>
      <option id='Haber'>Haber</option>
      <option id='Yazılım'>Yazılım</option>
    </select>
    <label for="inputPassword" class="sr-only">Anahtar Kelimeler</label>
    
    <div class="checkbox mb-5">
      <button onclick="createInput(); return false;">Anahtar Kelime Gir.</button><br><br>
      <div id="inputContainer"></div><br><br>


<div id='makaleolustur'>
      <button onclick="$.send(); return false;" class='btn btn-success'>Özgün Makale Oluştur.</button><br><br>
</div>

    </div>

  </form>
  <textarea class='form-control' id='makale' rows="10" cols="350" readonly></textarea>
  <a onclick="copyText(); return false;" class='btn btn-danger'>Kopyala</a>
</body>
</html>



<script>
  var i = 0;
  function createInput() {
    i++;
    var input = document.createElement("input");
    input.type = "text";
    input.placeholder = "Anahtar Kelime "+i;

    input.setAttribute("id", "key_"+i);
    input.setAttribute("class", "form-control");
    input.setAttribute("name", "key_"+i);
    var button = document.createElement("button");
    var t = document.createTextNode("Sil");
    button.setAttribute("class","btn btn-primary")
    button.appendChild(t);
    button.onclick = function(){

      document.getElementById("key_"+i).remove();
      button.remove();
      i--;
    }

    document.getElementById("inputContainer").appendChild(input);
    document.getElementById("inputContainer").appendChild(button);
  }
  function copyText() {
  var textarea = document.getElementById("makale");
  textarea.select();
  document.execCommand("copy");
  alert("Makale Kopyalandı");
}
  $( document ).ready(function() {
   

   $.send = function()
   {
     $(".btn-success").html('<i class="fa fa-refresh fa-spin"></i>Oluşturuluyor..');
     $(".btn-success").attr('disabled',true);
     $.ajax({
      url: "data.php",
      type:"post",
      data:$("#ozgunmakale").serialize(),
      dataType:"json",
      success: function(data) {
        if (data.choices[0].text)
        {
          $("#makaleolustur").html('Makale Oluşturuldu. Yeni Sorgu için sayfayı yenileyiniz.');
          $("#makale").html(data.choices[0].text);
        }
       
        
      }
    });
   }



 });
</script>
