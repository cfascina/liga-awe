function getClassification(roundId) {
    return $.ajax({
        type: 'GET',
        dataType: 'json',
        url: './api/classification/getClassification.php',
        data: {
            roundId: roundId
        }
    });
}