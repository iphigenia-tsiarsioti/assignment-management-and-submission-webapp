var cards=new Array();
var typoi=new Array();

function func(type,i){
    cards[i]=type;
    console.log("to i einai",i,"kai to tpye einai ",type);
}

function func_types(type,i){
    typoi[i]=type;
    console.log("to i einai",i,"kai to tpye einai ",type);
}

function init_types_color(){
    var types=document.querySelectorAll(".types-box");
    for(var i=0;i<types.length; i++){
        
            if(typoi[i]==="Κορμού"){
                types[i].style.borderLeft="6px solid  #3d4480";
            }else if(typoi[i]==="Ε3"){
                types[i].style.borderLeft="6px solid  #a72323";
            }else if(typoi[i]==="Ε4"){
                types[i].style.borderLeft="6px solid  #dbb824";
            }else if(typoi[i]==="Ε5"){
                types[i].style.borderLeft="6px solid  #3d8041";
            }else if(typoi[i]==="Ε6"){
                types[i].style.borderLeft="6px solid  rgb(116, 61, 128)";
            }else if(typoi[i]==="Ε7"){
                types[i].style.borderLeft="6px solid  #804e3d";
            }
          
        }
}

function init(){
    var squares=document.querySelectorAll(".card-body-1");
    var squares2=document.querySelectorAll(".card");
    for(var i=0;i<squares.length; i++){
        
            if(cards[i]==="Κορμού"){
                squares[i].style.backgroundColor='#3d4480';
                squares2[i].style.backgroundColor='rgba(191, 199, 219,0.9)';
            }else if(cards[i]==="Ε3"){
                squares[i].style.backgroundColor='#a72323';
                squares2[i].style.backgroundColor='rgba(235, 192, 188, 0.9)';
            }else if(cards[i]==="Ε4"){
                squares[i].style.backgroundColor='#dbb824';
                squares2[i].style.backgroundColor='rgba(227, 224, 166,0.9)';
            }else if(cards[i]==="Ε5"){
                squares[i].style.backgroundColor='#3d8041';
                squares2[i].style.backgroundColor='rgba(193, 219, 194,0.9)';
            }else if(cards[i]==="Ε6"){
                squares[i].style.backgroundColor='rgb(116, 61, 128)';
                squares2[i].style.backgroundColor='rgba(219, 193, 214,0.9)';
            }else if(cards[i]==="Ε7"){
                squares[i].style.backgroundColor='#804e3d';
                squares2[i].style.backgroundColor='rgba(128, 78, 61, 0.35)';
            }
          
        }
}

function open_ham() {
    var x = document.getElementById("navbarNavDropdown");
    if (x.className === "collapse navbar-collapse") {
      x.className += " responsive";
    } else {
      x.className = "collapse navbar-collapse";
    }
  }