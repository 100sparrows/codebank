// This uses foundation framework for the media query size and also 67degrees platform function for the themeExpand function.
if (typeof themeExpand === "function") {
    if (Foundation.MediaQuery.atLeast('large')) {
        let heightRefElement = document.querySelector('.vehicle--full .vehicle__secondary-images');
        //ensure to check it exists so other pages don't fail.
        if (heightRefElement) {
            let heightRef = heightRefElement.offsetHeight;
            console.error(heightRef);
            themeExpand('.vehicle--full .vehicle__description', heightRef);
        }
    } else {
        themeExpand('.vehicle--full .vehicle__description', 300);
    }
}