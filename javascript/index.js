
let i = 0
let speed = 100
let pTag = document.getElementById('heroText')

function printLineOne () {
    let lineOne = 'Positive | Resilient | Motivated'
    if(i < lineOne.length) {
        pTag.innerHTML += lineOne.charAt(i)
        i++
        setTimeout(printLineOne, speed)
    }
}

function printLineTwo () {
    let lineTwo = 'PHP | MYSQL | JavaScript | CSS | HTML'
    if(i < lineTwo.length) {
        pTag.innerHTML += lineTwo.charAt(i)
        i++
        setTimeout(printLineTwo, speed)
    }
}

function printLineThree () {
    let lineThree = 'Coffee Shop Owner | Dog Stalker | Wannabe Runner'
    if(i < lineThree.length) {
        pTag.innerHTML += lineThree.charAt(i)
        i++
        setTimeout(printLineThree, speed)
    }
}

function resetTypewriterOne () {
    pTag.innerHTML = " "
    if (i > 0) {
        i = 0
    }
    printLineOne()
}

function resetTypewriterTwo () {
    pTag.innerHTML = " "
    if (i > 0) {
        i = 0
    }
    printLineTwo()
}

function resetTypewriterThree () {
    pTag.innerHTML = " "
    if (i > 0) {
        i = 0
    }
    printLineThree()
}

//line one - 32
//line two - 37
//line 3 - 48
function typewriter () {
    setTimeout(resetTypewriterOne, 0)
    setTimeout(resetTypewriterTwo, 4000)
    setTimeout(resetTypewriterThree, 9000)
}

typewriter()
setInterval(typewriter, 15000)


window.addEventListener('blur', function () {
    console.log('blur')
})

window.addEventListener('focus', function () {
    console.log('focus')
})

window.addEventListener('visibilityChange', function () {
    let visibilityState = document.visibilityState
    if (visibilityState === 'hidden') {
        console.log('hidden')
    } else if (visibilityState === 'visible') {
        console.log('visible')
    }
})




