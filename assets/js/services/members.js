async function getMembers() {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMembers.php',
    });

    return result;
}

async function getMember(memberId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMember.php',
        data: {
            id: memberId
        }
    });

    return result;
}

async function getChartData(memberId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getChartData.php',
        data: {
            id: memberId
        }
    });

    return result;
}

async function getMostUsedScheme(memberId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMostUsedScheme.php',
        data: {
            id: memberId
        }
    });

    return result;
}

async function getMostUsedScheme(memberId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMostUsedScheme.php',
        data: {
            id: memberId
        }
    });

    return result;
}

