/*
 * @funct classManipulation
 * @param element {HTMLTag}
 */
const classManipulation = (element) => {
  // @return {Object}
  return {
    e: element,
    /*
     * @method add
     * @param classes {Array}
     */
    add: function (...classes) {
      // @if check if classes item on index 0 is Array
      const cls = !Array.isArray(classes[0]) ? classes : classes[0];
      // @loop class dan suntik ke-element
      cls.forEach((cls) => this.e.classList.add(cls));
      // @return {Object}
      return this;
    },
    /*
     * @method remove
     * @param classes {Array}
     */
    remove: function (...classes) {
      // @loop class dan suntik ke-element
      classes.forEach((cls) => this.e.classList.remove(cls));
      // @return {Object}
      return this;
    },
    /*
     * @method toggle
     * @param classes {Array}
     */
    toggle: function (...classes) {
      // @loop class dan suntik ke-element
      classes.forEach((cls) => this.e.classList.toggle(cls));
      // @return {Object}
      return this;
    },
    /*
     * @method contains
     * @param targetClass {String}
     */
    contains: function (targetClass) {
      // @return bool
      return this.e.classList.contains(targetClass);
    },
    // @method checkElement
    checkElement: function () {
      // cetak element ke konsol
      console.log(this.e);
    },
  };
};

// @export modules
export { classManipulation };
