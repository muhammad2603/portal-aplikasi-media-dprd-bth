import { classManipulation } from "./class-module.js";
// @class
class NavigationMobile {
    constructor(navContainer, navOverlay, navContents) {
        this.container = navContainer;
        this.overlay = navOverlay;
        this.contents = navContents;
    }
    // @method
    openNavigation() {
        classManipulation(this.container).remove("invisible")
        classManipulation(this.overlay).remove("opacity-0")
        classManipulation(this.contents).remove("translate-x-[-100%]")
        classManipulation(this.overlay).add("opacity-100")
        classManipulation(this.contents).add("translate-x-0")
    }
    // @method
    closeNavigation() {
        classManipulation(this.overlay).remove("opacity-100")
        classManipulation(this.contents).remove("translate-x-0")
        classManipulation(this.overlay).add("opacity-0")
        classManipulation(this.contents).add("translate-x-[-100%]")
        // invisible ditunda agar animasi transisi berjalan
        setTimeout(() => classManipulation(this.container).add("invisible"), 500)
    }
}

export { NavigationMobile };