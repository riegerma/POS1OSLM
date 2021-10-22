function initialize() {
    document.getElementsByName("weight")[0].onkeyup = calculateBmi;
    document.getElementsByName("size")[0].onkeyup = calculateBmi;
}

function calculateBmi() {
    console.log("calculateBmi")
    var weight = parseInt(document.getElementsByName("weight")[0].value);
    var height = parseInt(document.getElementsByName("size")[0].value);

    console.log("weight: " + weight);
    console.log("size: " + height);

    if (isNaN(weight) || isNaN(height)) {
        document.getElementById("ampel").innerHTML = "";

    } else {
        height /= 100; // cm -> m
        var bmi = weight / (height * height);
        console.log("bmi: " + bmi);

        return document.getElementById("ampel").innerHTML = getAmpelImage(bmi);
    }
}

function getAmpelImage(bmi) {
    console.log("getAmpelImage");
    if (bmi < 18.5) {
        return "<img src='/pos1OSLM/php12/php12-zusatz/images/ampel_gelb.png'/>";
    } else if (bmi < 25) {
        return "<img src='/pos1OSLM/php12/php12-zusatz/images/ampel_gruen.png'/>";
    } else if (bmi < 30) {
        return "<img src='/pos1OSLM/php12/php12-zusatz/images/ampel_gelb.png'/>";
    } else {
        return "<img src='/pos1OSLM/php12/php12-zusatz/images/ampel_rot.png'/>";
    }
}

function printAmpelJS(){
    document.write(getAmpelImage(calculateBmi()))
}
