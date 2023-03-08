Array.prototype.rand = function () {
    return this[Math.floor((Math.random()*this.length))];
}

class Person {
    owner = null;

    anus = {
        depth: 0,
        width: 0
    };

    vagina = {
        depth: 0,
        width: 0,
        litters: []
    };

    penis = {
        length: 0,
        girth: 0
    };

    breasts = {
        size: 0
    };

    constructor(gender = null, age = null, name = null) {
        this.id   = Date.now() + Math.random();
        this.gender = gender ?? ["m", "f", "h"].rand();
        this.age    = age    ?? 0;
        switch(this.gender) {
            case "m":
                this.breasts = null;
                this.vagina = null;
                break;

            case "f":
                this.penis = null;
                break;
        }
        this.name = name ?? names[this.gender].rand();
        this.pregnant = false;
        this.sire = null;
        this.dame = null;
        this.age  = 0;
    }

    fertility () {
        return this.age >= 12 ? 30 : 0;
    }

    breed(tgt) {
        if (
            ["h", "f"].includes(tgt.gender)
            && ["h", "m"].includes(this.gender)
        ) {
            if ((Math.random() * 100) < (this.fertility() + tgt.fertility())) {
                console.log("Someone got knocked up!");
                return Math.random() * 3;
            }
            return false;
        } else {
            return false;
        }
    }

    update() {
        this.age++;
    }

}

let sire = new Person();
sire.gender = "m";
sire.age = 12;

let dame = new Person();
dame.gender = "f";
dame.age = 12;

if (sire.breed(dame)) {
    child = new Person();
    child.sire = sire;
    child.dame = dame;
    dame.pregnant = true;
} else {
    child = null;
}
