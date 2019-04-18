console.log('hello')
var i = 0
var text = 'Positive | Resilient | Motivated'
var speed = 50
var pTag = document.getElementById('heroPersonalAttr')
function typewriter () {

    if(i < text.length) {
        pTag.innerHTML += text.charAt(i)
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
