
var i = 0
var speed = 50
var pTag = document.getElementById('heroPersonalAttr')

function printlineOne () {
    var lineOne = 'Positive | Resilient | Motivated'
    if(i < lineOne.length) {
        pTag.innerHTML += lineOne.charAt(i)
        i++
        setTimeout(printlineOne, speed)
    }
}

function resetTypewriter () {
    pTag.innerHTML = ""
    if (i > 0) {
        i = 0
    }

}

function typewriter () {
    resetTypewriter()
    printlineOne()
}

printlineOne()

setInterval(typewriter, 3000)
