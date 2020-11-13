// MELAKUKAN OPERASI ARITMATIKA
function hitung() {
    var hasil = 0;
    if(postfix[postfix.length-1]=='+') hasil = parseFloat(postfix[postfix.length-3]) + parseFloat(postfix[postfix.length-2]);
    else if(postfix[postfix.length-1]=='-') hasil = parseFloat(postfix[postfix.length-3]) - parseFloat(postfix[postfix.length-2]);
    else if(postfix[postfix.length-1]=='*') hasil = parseFloat(postfix[postfix.length-3]) * parseFloat(postfix[postfix.length-2]);
    else if(postfix[postfix.length-1]=='^') hasil = parseFloat(postfix[postfix.length-3]) ** parseFloat(postfix[postfix.length-2]);
    else if(postfix[postfix.length-1]=='%') hasil = parseFloat(postfix[postfix.length-3]) % parseFloat(postfix[postfix.length-2]);
    else{
        // ERROR PEMBAGIAN DENGAN 0
        if(parseFloat(postfix[postfix.length-2])==0){
            alert('ERROR : TIDAK BISA MEMBAGI DENGAN 0');
            error = true;
        }
        else hasil = parseFloat(postfix[postfix.length-3]) / parseFloat(postfix[postfix.length-2]);
    }
    postfix[postfix.length-3] = hasil.toFixed(4);
    postfix = postfix.slice(0, postfix.length-2);
}
// LEVEL OPERATOR
function level(operator) {
    switch (operator) {
        case '(': return 0; break;
        case '+':
        case '-': return 1; break;
        case '*':
        case '/':    
        case '%': return 2; break;
        case '^': return 3; break;
    }
}
// FUNCTION UNTUK VALIDASI INPUTAN
function validation(element) {
    if (!((element.charCodeAt()>=47 && element.charCodeAt()<=57)||element.charCodeAt()==37||(element.charCodeAt()>=40 && element.charCodeAt()<=43)||element.charCodeAt()==45||element.charCodeAt()==94)) {
        return true;
    }else return false;
}
// MENGELUARKAN DARI STACK ATAU TUMPUKAN
function poping_stack() {
    for (let i = stack.length-1; i >= 0; i--) {
        // ERROR TIDAK TERDAPAT KURUNG TUTUP
        if(stack[i]==('(')){
            alert('ERROR : TIDAK TERDAPAT KURUNG TUTUP');
            error = true;
            break;
        }else{
            postfix.push(stack[i]);
            hitung();
            stack.pop();
        }
    }
}
// CONVERT TO POSTFIX
function toPostfix(rumus){
    var array = rumus.split('');
    for (let i = 0; i < array.length; i++) {
        // ERROR INPUTAN TIDAK SESUAI
        if (validation(array[i])) {
            alert('ERROR : HANYA BISA MENERIMA ANGKA DAN OPERATOR YANG DITENTUKAN');
            error = true;
            break;   
        }else{
            // INPUTAN KURUNG BUKA
            if(array[i]=='('){
                if (i!=0)
                    // ERROR JIKA TERDAPAT ANGKA ATAU KURUNG TUTUP SEBELUM KURUNG BUKA
                    if ((array[i-1].charCodeAt()>=48 && array[i-1].charCodeAt()<=57)||array[i-1].charCodeAt()==41) {
                        alert('ERROR : SEBELUM KURUNG BUKA HARUS TERDAPAT OPERATOR');
                        error = true;
                        break;
                    }
                stack.push(array[i]);
            // INPUTAN KURUNG TUTUP
            }else if (array[i]==')') {
                var kurungBuka = false;
                for (let j = stack.length-1; j >= 0; j--) {
                    if (stack[j]=='('){
                        kurungBuka = true;
                        stack.pop();
                        break;                    
                    }
                    postfix.push(stack[j]);
                    hitung();
                    stack.pop();
                }
                // ERROR TIDAK TERDAPAT KURUNG TUTUP
                if (!kurungBuka) {
                    alert("ERROR : TIDAK TERDAPAT KURUNG TUTUP");
                    error = true;
                    break;
                }
            // INPUTAN ANGKA
            }else if (array[i].charCodeAt()>=48 && array[i].charCodeAt()<=57) {
                if (i==0) {
                    postfix.push(array[i]);
                }else{
                    if (array[i-1].charCodeAt()>=48 && array[i-1].charCodeAt()<=57) postfix[postfix.length-1] = postfix[postfix.length-1] + array[i];
                    else if(array[i-1].charCodeAt()==45 && array[i-2].charCodeAt()==40){
                        stack.pop();
                        postfix.push('-'+array[i]);
                    }
                    // ERROR JIKA SETELAH KURUNG TUTUP TERDAPAT ANGKA
                    else if (array[i-1].charCodeAt()==41) {
                        alert('ERROR : SETELAH KURUNG TERDAPAT ANGKA');
                        error = true;
                        break;
                    }else postfix.push(array[i]);
                }
            //INPUTAN OPERATOR
            }else {
                // ERROR JIKA RUMUS DIAWALI OPERATOR
                if (i==0) {
                    alert('ERROR : RUMUS HARUS DIAWALI OPERAND ATAU KURUNG BUKA');
                    error = true;
                    break;
                }else{
                    // ERROR JIKA TERDAPAT OPERATOR YANG BERURUTAN
                    if(array[i-1].charCodeAt()==37||array[i-1].charCodeAt()==42||array[i-1].charCodeAt()==43||array[i-1].charCodeAt()==45||array[i-1].charCodeAt()==47||array[i-1].charCodeAt()==94){
                        alert('ERROR : TERDAPAT OPERATOR YANG BERURUTAN');
                        error = true;
                        break;
                    }else{
                        if(stack.length==0) {
                            stack.push(array[i]);
                        }else{
                            if(level(array[i])>level(stack[stack.length-1])){
                                stack.push(array[i]);
                            }else{
                                for (let j = stack.length-1; j >= 0; j--) {
                                    if(stack[j]=='(') break;
                                    else{
                                        if(level(array[i])<=level(stack[j])){
                                            postfix.push(stack[j]);
                                            hitung();
                                            stack.pop();
                                        }else break;
                                    }
                                }
                                stack.push(array[i]);
                            }
                        }
                    }
                }
            }
        }  
    }
} 

// ---- MAIN ----

// INPUT RUMUS
var rumus = prompt("Input Rumus\nMisal : ((-2)*5)/((2-5)^3)\nHanya menerima operator : +,-,*,/,%,^2");
// HILANGKAN SPASI
rumus = rumus.split(' ').join('');
// DEKLARASI
var stack = [];
var postfix = [];
var error = false;
// PROSES
toPostfix(rumus);
poping_stack()
// OUTPUT
// alert('stack : '+ stack);
if (!error) {
    alert('Hasil :\n' + rumus + ' = ' + postfix);
}