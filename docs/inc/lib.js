Array.prototype.rand = function () {
    return this[Math.floor((Math.random()*this.length))];
}

class Person {
    owner = null;
    race = null;

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

    constructor(gender = null, age = null, name = null, race = null) {
        this.id      = Date.now() + Math.random();
        this.gender  = gender ?? ["m", "f", "h"].rand();
        this.race    = race   ?? Object.keys(races).rand();
        this.age     = age    ?? 0;
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
                console.log(tgt.name + " got knocked up by " + this.name);
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

class Game {
    static people = [];
    static create(count = 1) {
        for (let c = 0; c <= count; c++)
            Game.people.push(new Person());
    }
    static breed(sire, dame) {

    }
}