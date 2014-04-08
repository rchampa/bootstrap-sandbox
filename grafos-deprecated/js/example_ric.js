
var redraw, g, renderer;

/* only do all this when document has finished loading (needed for RaphaelJS) */
window.onload = function() {
    
    var width = $(document).width() - 20;
    var height = $(document).height() - 60;
    
    g = new Graph();

    /* add a simple node */
    g.addNode("strawberry",{x:4,y:4});
    g.addNode("cherry",{x:3,y:5});
    /*g.addNode("apple",{x:50,y:100});

   
    g.addEdge("strawberry", "cherry");
    g.addEdge("cherry", "apple");
    */
    /* layout the graph using the Spring layout implementation */
    //var layouter = new Graph.Layout.Spring(g);
    var layouter = new Graph.Layout.Fixed(g);
    
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


//----------------------------------------------------------------------------------------

Graph.Layout.Fixed = function(graph) {
	this.graph = graph;
	this.layout();
};
Graph.Layout.Fixed.prototype = {
	layout: function() {
		this.layoutPrepare();
		this.layoutCalcBounds();
	},

	layoutPrepare: function() {
		for (i in this.graph.nodes) {
			var node = this.graph.nodes[i];
			if (node.x) {
				node.layoutPosX = node.x;
			} else {
				node.layoutPosX = 0;
			}
			if (node.y) {
				node.layoutPosY = node.y;
			} 
			else {
				node.layoutPosY = 0;
			}
		}
	},

	layoutCalcBounds: function() {
		var minx = Infinity, maxx = -Infinity, miny = Infinity, maxy = -Infinity;

		for (i in this.graph.nodes) {
			var x = this.graph.nodes[i].layoutPosX;
			var y = this.graph.nodes[i].layoutPosY;

			if(x > maxx) maxx = x;
			if(y > maxy) maxy = y;
			if(y < miny) miny = y;
			if(x < minx) minx = x;
		}

		this.graph.layoutMinX = minx;
		this.graph.layoutMaxX = maxx;

		this.graph.layoutMinY = miny;
		this.graph.layoutMaxY = maxy;
	}
};

