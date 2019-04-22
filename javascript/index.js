
var i = 0
var speed = 50
var pTag = document.getElementById('heroPersonalAttr')

function typewriter () {
    var lineOne = 'Positive | Resilient | Motivated'
    if(i < lineOne.length) {
        pTag.innerHTML += lineOne.charAt(i)
        i++
        setTimeout(typewriter, speed)
    }
}

typewriter()

function resetTypewriter () {
    pTag.innerHTML = ""
    if (i > 0) {
        i = 0
    }
    typewriter()
}


setInterval(resetTypewriter, 3000)
