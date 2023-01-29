let slider = document.getElementById('slider')
let selector = document.getElementById('selector')
let selectValue = document.getElementById('selectValue')
let progressBar = document.getElementById('progressBar')
// let valBox=getElementById("valBox")
selectValue.innerHTML = slider.value

slider.oninput = function() {
  selectValue.innerHTML = this.value
  selector.style.left = this.value + '%'
  progressBar.style.width = this.value + '%'
}





<div class="d-flex">
                            <div class="main">
                            <input  type="range" min="0" max="100" value="50" step='10'  id="slider"
                            oninput="showVal(this.value)"onchange="showVal(this.value)" >
                            <div id="selector">
                                <div class="selectBtn"></div>
                                <div id="selectValue"></div>
                                </div>
                                <div id="progressBar"></div>
                            </div>         
                            <input type="number"  id="valBox" class="inputrange m-2" value="50">
                            M
                            </div>