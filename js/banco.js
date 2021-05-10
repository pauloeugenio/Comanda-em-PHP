/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function database() {
    return openDatabase('giraletodb', '1.0', 'Girleto DB', 1 * 1024 * 1024);
}


function  iniciarDB() {
    var db = database();
    db.transaction(function (tx) {
        //tx.executeSql('DROP TABLE DIALETO');
        tx.executeSql('CREATE TABLE IF NOT EXISTS DIALETO (idDialeto  INTEGER PRIMARY KEY, nomeDialeto,significado,origem,sinonimo,regiao,aplFrase,codAudio)');
        tx.executeSql('INSERT INTO DIALETO (idDialeto,nomeDialeto,significado, origem, sinonimo, regiao,aplFrase,codAudio) VALUES (1,"Novinha","Termo usado para se referir as garotas novas", "Nordeste","Boyzinha","Nordeste","Que novinha linda!",1);');
        tx.executeSql('INSERT INTO DIALETO (idDialeto,nomeDialeto,significado, origem, sinonimo, regiao,aplFrase,codAudio) VALUES (2,"Perai", "Termo usado para pedir que alguém te espere", "Nordeste","Calma ai", "Nordeste","Ei Bruno, perai..", "2");');
        tx.executeSql('INSERT INTO DIALETO (idDialeto,nomeDialeto,significado, origem, sinonimo, regiao,aplFrase,codAudio) VALUES (3,"Tio", "Termo usado para se referir as pessoas mais velhas", "Sudeste","Corôa", "Sudeste", "Ei tio, compra uma bala pra mim?",  "3");');
        tx.executeSql('INSERT INTO DIALETO (idDialeto,nomeDialeto,significado, origem, sinonimo, regiao,aplFrase,codAudio) VALUES (4,"Aluado", "Pessoa que se encontra desorientada", "Nordeste","Desorientado","Nordeste", "Ele ficou meio aluado depois da bronca.",  "4");');
        tx.executeSql('INSERT INTO DIALETO (nomeDialeto,significado, origem, sinonimo, regiao,aplFrase,codAudio) VALUES ("Abestalhado", "Pessoa que tem pouca noção das atitudes", "Nordeste","Abobalhado","Nordeste", "Oh danado abestalhado!",  "5");');
        tx.executeSql('INSERT INTO DIALETO (nomeDialeto,significado, origem, sinonimo, regiao,aplFrase,codAudio) VALUES ("Caneco", "Anus, cu", "Nordeste","cu","Nordeste", "Vai dar o caneco!",  "5");');

    });
}

function selecionarTodos( ) {
    var db = database();
    var len;
    var resultado = new Array();
    db.transaction(function (tx) {
       tx.executeSql('SELECT * FROM DIALETO ORDER BY nomeDialeto ASC', [], function (tx, results) {
            len = results.rows.length;
            
    for (i = 0; i < results.rows.length; i++) {
        console.debug(dialeto)
        resultado.push(dialeto);
    }
            return resultado;
      }, function (tx, error) {
            alert('ooops ' + error.message);
      });   
    }); 
};

function teste(results){
    return resultado;
}

//SELECIONAR POR NOME OU REGIAO 
function selelecionarDialetoPorNome(nome, regiao) {
    var db = database();
    db.transaction(function (tx) {
        var resultado = new Array();
        tx.executeSql('SELECT * FROM DIALETO WHERE nomeDialeto LIKE "%?"  OR regiao= ? ORDER BY nomeDialeto ASC',
        [nome,regiao], function (tx, results) {
            
            var len = results.rows.length, i;
            for (i = 0; i < len; i++) {
                var dialeto = new Dialeto();
                dialeto.setIdDialeto(results.rows.item(i).codDialeto);
                dialeto.setNomeDialeto(results.rows.item(i).nomeDialeto);
                dialeto.setSignificado(results.rows.item(i).significado);
                dialeto.setOrigem(results.rows.item(i).origem);
                dialeto.setSinonimo(results.rows.item(i).sinonimo);
                dialeto.setRegiao(results.rows.item(i).regiao);
                dialeto.setAplFrase(results.rows.item(i).aplFrase);
                dialeto.setCodAudio(results.rows.item(i).codAudio);
                resultado.push(dialeto);
            }

        }, function (tx, error) {
            alert('ooops ' + error.message);
        });
    });
}
;
//SELECIONAR
function selelecionarDialeto(idDialeto) {
    var db = database();
    db.transaction(function (tx) {
         var resultado =null;
        tx.executeSql('SELECT * FROM DIALETO WHERE idDialeto=?', [idDialeto],
                function (tx, results) {
                    var len = results.rows.length, i=0;
                   
                  var dialeto = new Dialeto(results.rows.item(i).codDialeto,
                        results.rows.item(i).nomeDialeto,
                        results.rows.item(i).significado,
                        results.rows.item(i).origem,
                        results.rows.item(i).sinonimo,
                        results.rows.item(i).aplFrase,
                        results.rows.item(i).regiao,
                        results.rows.item(i).codAudio);
                        resultado = dialeto;
                   
                });
        return resultado;

    });
}
;

//CADASTAR
function cadastarDialeto(nomeDialeto, significado, origem, sinonimo, regiao, aplFrase, codAudio) {
    var db = database();
    db.transaction(function (tx) {
        tx.executeSql('INSERT INTO DIALETO (nomeDialeto,significado, origem, sinonimo, regiao,aplFrase,codAudio) VALUES (?, ?, ?,?,?, ?, ?)',
                [nomeDialeto, significado, origem, sinonimo, regiao, aplFrase, codAudio]);

    });
};
//cadastrar
function cadastarDialetoDB(dialeto) {
    var db = database();
    db.transaction(function (tx) {
        tx.executeSql('INSERT INTO DIALETO (nomeDialeto,significado, origem, sinonimo, regiao,aplFrase,codAudio) VALUES (?, ?, ?,?,?, ?, ?)',
                [dialeto.nomeDialeto, dialeto.significado, dialeto.origem, dialeto.sinonimo, dialeto.regiao, dialeto.aplFrase,
                    dialeto.codAudio]);

    });
};

//EDITAR 
function editarDialeto(nomeDialeto, significado, origem, sinonimo, regiao, aplFrase, codAudio, idDialeto) {
    var db = database();
    db.transaction(function (tx) {
        tx.executeSql('UPDATE DIALETO SET nomeDialeto=?,significado=?, origem=?, sinonimo=?, regiao=?,aplFrase=?,codAudio=?) WHERE idDialeto=?',
                [nomeDialeto, significado, origem, sinonimo, regiao, aplFrase, codAudio, idDialeto]);
    });
};

//deletar
function removerRegistro(id){
    var db = database();
    db.transaction(function (tx) {
        tx.executeSql('DELETE FROM DIALETO WHERE idDialeto=?',[id]);
    });
}

//db.transaction(function (tx) {
//   tx.executeSql('DROP TABLE DIALETO');
//   deletar dialeto
//    tx.executeSql('DELETE FROM DIALETO WHERE codDialeto=1 ');
//});