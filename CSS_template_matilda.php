<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

@import url("https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap");

* {
   margin: 0;
   padding: 0;
   list-style: none;
   border: 0;
   outline: 0;
   -webkit-tap-highlight-color: transparent;
   text-decoration: none;
   color: inherit;
   box-sizing: border-box;
}

body { 
  margin: 0;
  font-family: "Raleway", sans-serif;
  background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

.header {
  width: 100%;
  height: 100%;
  position: relative;
  padding: 0 80px;
}
/* .header {
  overflow: hidden;
  background-image: linear-gradient(90deg, rgba(86,30,91,1) 0%, rgba(84,13,116,1) 35%, rgba(25,134,144,1) 100%);
  padding: 30px 60px;
  backdrop-filter: blur(10px);
} */

.header a {
  float: left;
  color: #9197ae;
  text-align: center;
  padding: 12px;
  font-family: "Raleway", sans-serif;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
  font-weight: 600;
  font-size: 16px;
}


.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
    background-color: #FCF3F0;
    transform: translateY(-5px);
    box-shadow: inset 0px -20px 0px white;
}

.header-right {
  float: right;
}

/* @media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
} */

</style>
</head>
<body>

<div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
    <a href="#home">HOME</a>
    <a href="#statistics">STATISTICS</a>
    <a href="#contact">CONTACT</a>
    <a href="#about">ABOUT</a>
  </div>
</div>

<div style="padding-left:20px">
</div>


</body>
</html>
