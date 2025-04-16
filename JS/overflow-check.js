// Overflow boolean checker
const elements = document.querySelectorAll(
  ".vehicle--full .vehicle__header-third .vehicle__description"
);
console.error("Elements: ", elements);
if (elements.length > 0) {
  elements.forEach((el) => {
    if (el.scrollHeight > el.clientHeight) {
      const readMoreLink = document.querySelector(".vehicle__description-link");
      readMoreLink.classList.remove("hide");
    }
  });
}



@mixin data-link{
	text - align: right;
	padding-top:2.8em;
	background: linear-gradient(0deg,$secondary-color 0%, rgba($secondary-color,0.75) 100%);
	position: relative;
	margin-top:-1em;
  @include breakpoint(xxlarge) {
    margin-right: - rem-calc(55);
  }
  a {
    color: $primary-color;
    font-size: rem-calc(14);
    font-weight: $global-weight-semi-bold;
    text-decoration: underline;
    text-transform: uppercase;
    span {
      position: relative;
      top: rem-calc(5);
      height: rem-calc(40);
      width: rem-calc(40);
      margin-left: rem-calc(10);
      font-size: rem-calc(18);
      line-height: rem-calc(40);
      border-radius: 50%;
      background: $white;
      color: $black;
      text-align: center;
    }
  }
}
// I tried to use the following to hide the content but my sass compiler wouldn't compile it. Appraently it is valid and supported though https://caniuse.com/?search=line-clamp
.your-element {
  display: -webkit-box;
  -webkit-line-clamp: 3;      /* Number of lines to show */
  -webkit-box-orient: vertical;
  overflow: hidden;
}