import Swup from "swup";
import SwupFadeTheme from "@swup/fade-theme";
import SwupBodyClassPlugin from "@swup/body-class-plugin";
import SwupProgressPlugin from "@swup/progress-plugin";

function init() {}

document.addEventListener("DOMContentLoaded", () => {
	const swup = new Swup({
		plugins: [new SwupFadeTheme(), new SwupBodyClassPlugin(), new SwupProgressPlugin()],
		linkSelector: 'a[href^="' + window.location.origin + '"]:not([data-no-swup]), a[href^="/"]:not([data-no-swup])',
	});

	// run once
	init();

	// this event runs for every page view after initial load
	swup.on("contentReplaced", init);
});
