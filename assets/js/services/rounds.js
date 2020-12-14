async function getRoundsQuantity() {
    const result = await $.ajax({
        type: 'GET',
        url: './api/rounds/getRoundsQuantity.php'
    });

    return result;
}