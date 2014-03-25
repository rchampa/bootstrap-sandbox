
var redraw, g, renderer;

/* only do all this when document has finished loading (needed for RaphaelJS) */
dibujar = function() {
    
//    var width = $(document).width() - 20;
//    var height = $(document).height() - 60;
    var width = 600;
    var height = 200;
    
    g = new Graph();

    /* add a simple node */
    g.addNode("strawberry");
    g.addNode("cherry");

    /* add a node with a customized label */
//    g.addNode("1", { label : "Tomato" });
//
//    g.addNode("id35", {
//        label : "meat\nand\ngreed" //,
//        /* filling the shape with a color makes it easier to be dragged */
//        /* arguments: r = Raphael object, n : node object */
////        render : render
//    });
//    
//
//    st = { directed: true, label : "Label",
//            "label-style" : {
//                "font-size": 20
//            }
//        };
//    g.addEdge("kiwi", "penguin", st);

    /* connect nodes with edges */
    g.addEdge("strawberry", "cherry");
    g.addEdge("cherry", "apple");
    g.addEdge("cherry", "apple")
//    g.addEdge("1", "id35");
//    g.addEdge("penguin", "id35");
//    g.addEdge("penguin", "apple");
//    g.addEdge("kiwi", "id35");
//
//    /* a directed connection, using an arrow */
//    g.addEdge("1", "cherry", { directed : true } );
//    
//    /* customize the colors of that edge */
//    g.addEdge("id35", "apple", { stroke : "#bfa" , fill : "#56f", label : "Meat-to-Apple" });
//    
//    /* add an unknown node implicitly by adding an edge */
//    g.addEdge("strawberry", "apple");

    //g.removeNode("1");

    /* layout the graph using the Spring layout implementation */
    var layouter = new Graph.Layout.Spring(g);
    
    /* draw the graph using the RaphaelJS draw implementation */
    renderer = new Graph.Renderer.Raphael('canvas', g, width, height);
    
    redraw = function() {
        layouter.layout();
        renderer.draw();
    };
    hide = function(id) {
        g.nodes[id].hide();
    };
    show = function(id) {
        g.nodes[id].show();
    };
    //    console.log(g.nodes["kiwi"]);
};

