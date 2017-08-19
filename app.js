let express = require('express');
let app = express();

app.get('/nome/:nome', (req, res) => {
    let nome = req.params.nome;
    let objectJson = {nome: nome, idade: 26};

    res.json(objectJson);
});

app.post('/trident', (req, res) => {
    let dadosTrident = req.body;

    console.log(dadosTrident);
});

app.listen(3000, () => {
   console.log('O servidor foi iniciado e pode ser acessado em localhost:3000');
});