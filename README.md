# Slamax-WebDK

A ligthweigth fast and powerfull Web API made in pure Php. 
Is capable of forging websites and online apps, it is full cross platform and cross browser.

SlamaxWebDK comes with a fast and reliable Template system,
and a Theme based style system.

SlamaxWebDK it is not a classical Php API, infact
it is not only capable of processing server side code
and logic, but also client side.

### Why use SlamaxWebDK?

Programming website is becoming more complex, a lot
of old frameworks needed the developer to know
some Css and Javascript in order to use it properly,
so a lot of solutions came up these years
that allows to combine server, template and style
logic altogheter.

SlamaxWebDK is the Php solutions, because is capable of serializing
Css and Javascript calls, thanks to the SlsmaxObject class,
wich comes with a prebuilt event system that allows
you to neatly organize your code! [Slammer](https://my.com/)

### Performance

SlamaWebDK brings you wonderfull performance as it doesnt parse
any content, doesn't have a scripting system  and is not any kind of 
virtual machine, instead, it binds syntactic
feature directly into default php methods, so you can
just call the functions you need, and it fills
a buffer with fully specialied code.
It has a built in caching system wich furtermore 
increases performances.

### Example of use

Here is a simple example that gets you started.

```markdown

#Example of a simple WebPage

class examplePage extends Page {
    function Create(){
       #Browser page title
       $this->pageTitle='My complete Web Page!';
       #Adds content to this page
       $this->addContent('Hello World!');
    }
    function eventOnBeginView() {
      #Prints a log to the javascript function
      Console::log('Javascript initialized!');
    }
}

class exampleTemplate extends Template {
    function Create(){
        #Page logic
        $this->currentPage = new examplePage;
        #Default theme applied
        $this->applyTheme(new BasicTheme);
    }
}

new ExampleTemplate;

```

For more details see [GitHub Flavored Markdown](https://guides.github.com/features/mastering-markdown/).

### Third party software

SlamaxWebDK does not use any third party software,
nor any extension/dependencies, it works with
pure php code.

### Software Licence

SlamaxWebDK is under the Apache licence! check the licence file
inside the repository before use it in your code!

### Support or Contact

Need support or have some issues? Check out our [documentation](https://help.github.com/categories/github-pages-basics/), 
feel free to submit any issues or [contact support](https://github.com/contact) and we’ll help you sort it out.
