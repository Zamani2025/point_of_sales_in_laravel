<div class="calculator">
    <a href="" class="btn bg-danger"><i class="fa fa-times text-white"></i></a>
    <input id="calInput" type="text" placeholder="0">
    <div>
        <button class="btncalculator operator button">AC</button>
        <button class="btncalculator operator button">DEL</button>
        <button class="btncalculator operator button">%</button>
        <button class="btncalculator operator button">/</button>
    </div>
    <div>
        <button class="btncalculator button">7</button>
        <button class="btncalculator button">8</button>
        <button class="btncalculator button">9</button>
        <button class="btncalculator operator button">*</button>
    </div>
    <div>
        <button class="btncalculator button">4</button>
        <button class="btncalculator button">5</button>
        <button class="btncalculator button">6</button>
        <button class="btncalculator operator button">-</button>
    </div>
    <div>
        <button class="btncalculator button">1</button>
        <button class="btncalculator button">2</button>
        <button class="btncalculator button">3</button>
        <button class="btncalculator operator button">+</button>
    </div>
    <div>
        <button class="btncalculator button">00</button>
        <button class="btncalculator button">0</button>
        <button class="btncalculator button">.</button>
        <button class="equalBtn btncalculator button">=</button>
    </div>
</div>

<style>
    .calculator{
        border: 1px solid #717377;
        padding: 20px;
        float: right;
        margin-top: 10px;
        width: 25%;
        border-radius: 15px;
        background: rgb(52, 73, 94);
        box-shdow: 0px 3px 15px rgba(113, 115, 119, 0.5);
    }
    input#calInput{
        width: 100%;
        border: none;
        color: #fff;
        padding:10px;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 0;
        background: transparent;
        box-shadow: 0px 3px 15px rgba(84, 84, 84, 0.1);
        font-size: 40px;
        text-align: right;
        cursor: pointer;
    }
    input:placeholder{
        color: #fff;
    }
    button.btncalculator{
        border: none;
        width: 60px;
        height: 60px;
        margin: 10px;
        border-radius: 20px;
        background: transparent;
        color: #fff;
        font-size: 20px;
        box-shadow: -8px -8px 15px rgba(255, 255, 255, 0.2);
        cursor: pointer;
    }
    .equalBtn{
        background: #fb7c14 !important;
    }
    .operator{
        color: #6dee0a !important;
    }

</style>

<script>
    let input = document.getElementById('calInput');
    let buttons = document.querySelectorAll('.button');

    let string = "";
    let arr = Array.from(buttons);
    arr.forEach(button => {
        button.addEventListener('click', (e) => {
            if(e.target.innerHTML == '='){
                string = eval(string);
                input.value = string;
            }
            else if(e.target.innerHTML == "AC"){
                string = "";
                input.value = string;
            }else if(e.target.innerHTML == 'DEL') {
                string = string.substring(0, string.length-1);
                input.value = string;
            }
            else{
                string += e.target.innerHTML;
                input.value = string;
            }
        });
    });
</script>