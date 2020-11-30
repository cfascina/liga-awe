async function getClassification(roundId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/classification/getClassification.php',
        data: {
            roundId: roundId
        }
    });

    return result;
}
