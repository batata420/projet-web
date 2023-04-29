'use strict'

const statusDisplay = document.getElementById('status')
const countField = document.getElementById('numberTurns')
const startBox = document.getElementById('startBox')
const playField = document.getElementById('field')
const player1_name = document.getElementById('player1_name')
const player2_name = document.getElementById('player2_name')
const player1 = document.getElementById('player1')
const player2 = document.getElementById('player2')
let isBotGame=false
let gameActive = true
let currentPlayer = '<i class="fa-regular fa-face-laugh-squint"></i>'
let gameState = []
let cols, rows, steps, counter = 0
let playerXWins= 0
let playerOWins= 0





let checkInput = (input) => {
    input = +input
    input = (input < 3)
        ? 3
        : (input > 10)
            ? 10
            : input
    return input
}
let createMatrix = () => {
    let arr
    for (let i = 0; i < rows; i++) {
        arr = []
        for (let j = 0; j < cols; j++) {
            arr[j] = 0
        }
        gameState[i] = arr
    }
    console.log(gameState)
}
let drawField = () => {
    let cellSize = window.innerHeight * 0.5 / cols
    let box = document.createElement('div')
    box.setAttribute('id', 'container')

    let cell, row
    for (let i = 0; i < rows; i++) {
        row = document.createElement('div')
        row.className = 'row'
        for (let j = 0; j < cols; j++) {
            cell = document.createElement('div')
            cell.setAttribute('id', `${i}_${j}`)
            cell.className = 'cell'
            cell.style.width =
                cell.style.height =
                    cell.style.lineHeight = `${cellSize}px`
            cell.style.fontSize = `${cellSize / 16}em`
            row.appendChild(cell)
        }
        box.appendChild(row)
    }
    playField.appendChild(box)
}

let handleStart = () => {
    
    playerXWins= 0
     playerOWins= 0
    
    player1.innerHTML = player1_name.value === '' ? 'Player \'X\'' : player1_name.value;// i badil isim il player bili ketbou inti
   
        if (player2_name.value === 'Bot') {
            player2.innerHTML = 'Bot';
            isBotGame = true;
        } else {
            player2.innerHTML = player2_name.value === '' ? 'Player \'O\'' : player2_name.value;// same ema na7na amlin combobox donc ye5ou ken minhom
            isBotGame = false;
        }

    cols = checkInput(document.getElementById('columns').value)
    rows = checkInput(document.getElementById('rows').value)
    steps = checkInput(document.getElementById('steps').value)
    createMatrix()
    drawField()
    startBox.className = 'hidden'
    handlePlayerSwitch()
    document.querySelectorAll('.cell')
        .forEach(cell => cell.addEventListener('click', handleClick))
    }


    let isWinning = (y, x) => {
        let winner = currentPlayer === '<i class="fa-regular fa-face-laugh-squint"></i>' ? 1 : 2,
            length = steps * 2 - 1,
            radius = steps - 1,
            countWinnMoves, winnCoordinates
    
        countWinnMoves = 0
        winnCoordinates = []
        for (let i = y, j = x - radius, k = 0; k < length; k++, j++) {
            if (i >= 0 && i < rows && j >= 0 && j < cols &&
                gameState[i][j] === winner && gameActive) {
                winnCoordinates[countWinnMoves++] = [i, j]
                if (countWinnMoves === steps) {
                    
                    if (currentPlayer === '<i class="fa-regular fa-face-laugh-squint"></i>') { //kol mara izid point lil amal score
                        playerXWins++
                    } else {
                        playerOWins++
                    }
                    return
                }
            } else {
                countWinnMoves = 0
                winnCoordinates = []
            }
        }
    
        countWinnMoves = 0
        winnCoordinates = []
        for (let i = y - radius, j = x, k = 0; k < length; k++, i++) {
            if (i >= 0 && i < rows && j >= 0 && j < cols &&
                gameState[i][j] === winner && gameActive) {
                winnCoordinates[countWinnMoves++] = [i, j]
                if (countWinnMoves === steps) {
                    

                    if (currentPlayer === '<i class="fa-regular fa-face-laugh-squint"></i>') {
                        playerXWins++
                    } else {
                        playerOWins++
                    }
                    return
                }
            } else {
                countWinnMoves = 0
                winnCoordinates = []
            }
        }
    
        countWinnMoves = 0
        winnCoordinates = []
        for (let i = y - radius, j = x - radius, k = 0; k < length; k++, i++, j++) {
            if (i >= 0 && i < rows && j >= 0 && j < cols &&
                gameState[i][j] === winner && gameActive) {
                winnCoordinates[countWinnMoves++] = [i, j]
                if (countWinnMoves === steps) {
                    
                    if (currentPlayer === '<i class="fa-regular fa-face-laugh-squint"></i>') {
                        playerXWins++
                    } else {
                        playerOWins++
                    }
                    return
                }
            } else {
                countWinnMoves = 0
                winnCoordinates = []
            }
        }
    
        countWinnMoves = 0
        winnCoordinates = []
        for (let i = y - radius, j = x + radius, k = 0; k < length; k++, i++, j--) {
            if (i >= 0 && i < rows && j >= 0 && j < cols &&
                gameState[i][j] === winner && gameActive) {
                winnCoordinates[countWinnMoves++] = [i, j]
                if (countWinnMoves === steps) {
                    
                    if (currentPlayer === '<i class="fa-regular fa-face-laugh-squint"></i>') {
                        playerXWins++
                    } else {
                        playerOWins++
                    }
                    return
                }
            } else {
                countWinnMoves = 0
                winnCoordinates = []
            }
        }
    }

let handlePlayerSwitch = () => {
    if (currentPlayer === '<i class="fa-regular fa-face-laugh-squint"></i>') {
        player1.style.background = '#8458B3'
        player2.style.background = '#d0bdf4'
    } 
    
    else if (isBotGame===true)// bot iwali yal3ib
     {
        
                
                setTimeout(() => 
                {
                    let i = Math.floor(Math.random() * rows)
                    let j = Math.floor(Math.random() * cols)
        
                    while (gameState[i][j] !== 0) {        
                        i = Math.floor(Math.random() * rows)    
                        j = Math.floor(Math.random() * cols)
                    }
        
                    gameState[i][j] = 2    
                    let cell = document.getElementById(`${i}_${j}`)    
                    cell.innerHTML = currentPlayer
                    countField.innerHTML = `${++counter}`
        
                    isWinning(i, j)
                    isMovesLeft()
                    currentPlayer = '<i class="fa-regular fa-face-laugh-squint"></i>'
                    handlePlayerSwitch()
                    
                }, 500) 
            }
            else if ( currentPlayer ==='<i class="fa-sharp fa-regular fa-face-surprise"></i>') {
                player1.style.background = '#d0bdf4'
                player2.style.background = '#8458B3'
            }
        }
          

let isMovesLeft = () => {
    if (counter === cols * rows) {
        if (playerXWins > playerOWins) {//9arin enahou andou akbir score ou ital3ou winner ps:  game crash baid tori7 thid bot ema player vs bot yi5dim
            
            statusDisplay.innerHTML = "Player X is the winner!"
        } else if (playerOWins > playerXWins) {
            
            statusDisplay.innerHTML = "Player O is the winner!"
        } else {
            
            statusDisplay.innerHTML = "It's a tie!"
        }
        gameActive = false
        return
        
    }
   
}

let handleClick = (event) => {
    let clickedIndex = event.target.getAttribute('id').split('_');
    let i = +clickedIndex[0]
    let j = +clickedIndex[1]

    if (gameState[i][j] !== 0 || !gameActive)
        return

    gameState[i][j] = (currentPlayer === '<i class="fa-regular fa-face-laugh-squint"></i>') ? 1 : 2
    event.target.innerHTML = currentPlayer
    countField.innerHTML = `${++counter}`

    isWinning(i, j)
    isMovesLeft()
    currentPlayer = currentPlayer === '<i class="fa-regular fa-face-laugh-squint"></i>' ? '<i class="fa-sharp fa-regular fa-face-surprise"></i>' : '<i class="fa-regular fa-face-laugh-squint"></i>'
    handlePlayerSwitch()

}




let handlePlayAgain = () => {
    gameActive = true
    currentPlayer = '<i class="fa-regular fa-face-laugh-squint"></i>'
    counter = 0
    countField.innerHTML = '0'
    statusDisplay.innerHTML = ''
    statusDisplay.style.color = 'black'
    player1.style.background = player2.style.background = '#d0bdf4'
    playField.removeChild(document.getElementById('container'))
    handleStart()
}

let handleRestart = () => {
    gameActive = true
    currentPlayer = '<i class="fa-regular fa-face-laugh-squint"></i>'
    counter = 0
    countField.innerHTML = '0'
    statusDisplay.innerHTML = ''
    statusDisplay.style.color = 'black'
    player1.style.background = player2.style.background = '#d0bdf4'
    player1_name.value = player2_name.value = ''
    player1.innerHTML = player2.innerHTML = '-'
    startBox.className = 'sidebar'
    playField.removeChild(document.getElementById('container'))
}

document.querySelector('#start').addEventListener('click', handleStart)
document.querySelector('#playAgain').addEventListener('click', handlePlayAgain)
document.querySelector('#restart').addEventListener('click', handleRestart)
