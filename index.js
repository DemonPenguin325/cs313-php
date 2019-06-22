const express = require('express')
const app = express()
const port = process.env.port || 3000

app.use(express.static('public'))
app.set('views', 'views')
app.set('view engine', 'ejs')

app.get('/calc', calcCost)
app.get('/', function(req, res) {res.render('Hello world!')})

app.listen(port, () => console.log('Mail app listening on port ' + port))

 function calcCost(req, response) {
     const weight = req.query.weight
     const type = req.query.letterType
     var cost = 0

     switch (type){
        case 'stamped':
            cost = .55 + (Math.ceil(weight) * .15)
            break;
        case 'metered':
            cost = .5 + (Math.ceil(weight) * .15)
            break;
        case 'flats':
            cost = 1 + (Math.ceil(weight) * .15)
            break;
        case 'retail':
            cost = 3.66 + (Math.floor(Math.ceil(weight)/4) * .73)
            break;
     }

     response.render('results', {weight: weight, type: type, cost: cost.toFixed(2)})
 }