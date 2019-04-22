
var i = 0
var speed = 50
var pTag = document.getElementById('heroPersonalAttr')

function lineOne () {
    var lineOne = 'Positive | Resilient | Motivated'
    if(i < lineOne.length) {
        pTag.innerHTML += lineOne.charAt(i)
        i++
        // setTimeout(lineOne, speed)
    }
}

function lineTwo () {
    var lineTwo = 'PHP | MYSQL | JavaScript | CSS | HTML'
    if(i < lineTwo.length) {
        pTag.innerHTML += lineTwo.charAt(i)
        i++
        setTimeout(lineTwo, speed)
    }
}

function lineThree () {
    var lineThree = 'Coffee Shop Owner | Dog Stalker | Wannabe Runner'
    if(i < lineThree.length) {
        pTag.innerHTML += lineThree.charAt(i)
        i++
        setTimeout(lineThree, speed)
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
    lineOne()
    // resetTypewriter()
    // lineTwo()
    // resetTypewriter()
    // lineThree()
}

lineOne()
// setInterval(typewriter, 3000)