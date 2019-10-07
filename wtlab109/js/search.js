var keyTag = [];
var keyTitle = [];
var responseLi;
var liStart = 0;
var pageVolume = 6;
var liEnd = liStart+pageVolume;

//增加或刪除filter
function toggleFilt(filt){
  //判斷使否已在filter裡
  if(!filt.classList.contains("active")){
    keyTag.push(filt.innerHTML);
  }
  else{
    keyTag.splice(keyTag.indexOf(filt.innerHTML), 1);
  }
  filt.classList.toggle("active");
  filt.classList.toggle("w3-white");
  filt.classList.toggle("w3-blue");
  searchText();
}

//search title and tag
function  searchText(){
  var input = document.getElementById("keyword").value;
  var sortMethod = document.getElementById("sortMethod").value;

  if(input != "" || keyTag.length != 0){
    //切割關鍵字，分別搜尋
    keyTitle = input.match(/\S+/g) || [];

    searchKey(keyTitle, keyTag, sortMethod);
  }
  else{
    window.alert("please enter a search value!");
    return false;
  }
}

function searchKey(title, tag, sortMethod){
  //預防ajax post method把空陣列移除
  if(tag.length == 0)
    tag = [""];

  if(title.length == 0)
    title = [""];

  $.ajax({
    url: "php/searchVid.php",
    type: "POST",
    data: {"keyTitle": title,
           "keyTag": tag,
           "sortMethod": sortMethod},
    dataType:'json',
    success: function(vidLi){
      //console.log(vidLi);
      responseLi = [].concat(vidLi);
      showList(liStart, liEnd);
    },
    error: function(jqXHR, textStatus, errorThrown){
      console.log( errorThrown);
    }
  });

}

function showList(start, end){
  var vidList = document.getElementById("search_result");
  //初始化搜尋結果
  vidList.innerHTML = "";
  //確認responseLi是否填得滿此頁
  if(end > responseLi.length){
    end = responseLi.length;
  }
  for(var i = start; i < end; i++){
    var li = document.createElement("li");
    li.style = "padding: 3px";
    var a = document.createElement("a");
    var liDiv = document.createElement("div");
    var thumb = document.createElement("div");
    var img = document.createElement("img");
    var content = document.createElement("div");

    a.href = "watch.php?v=" + responseLi[i].id;
    liDiv.setAttribute('class', "w3-row-padding w3-white w3-padding w3-round-xlarge");
    thumb.setAttribute('class', "w3-col");
    thumb.style = "width: 300px";
    img.src = "https://img.youtube.com/vi/" + responseLi[i].id + "/hqdefault.jpg";
    img.style = "width: 100%";
    content.setAttribute('class', "w3-rest");
    content.innerHTML = responseLi[i].title;

    li.appendChild(a);
    a.appendChild(liDiv);
    liDiv.appendChild(thumb);
    liDiv.appendChild(content);
    thumb.appendChild(img);
    vidList.appendChild(li);
  }

}

function load(){
  var sortMethod = document.getElementById("sortMethod");
  sortMethod.addEventListener("change", searchText, false);
  searchText();
}

window.addEventListener("load", load, false);
