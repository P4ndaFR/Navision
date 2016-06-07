package dijkstra.main;

import java.io.BufferedWriter;
import java.io.IOException;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.LinkedList;
import java.util.List;

import dijkstra.engine.DijkstraAlgorithm;
import dijkstra.model.DbAccess;
import dijkstra.model.Edge;
import dijkstra.model.Graph;
import dijkstra.model.Vertex;

public class main {
	private static List<Vertex> nodes;
	private static List<Edge> edges;
	private static DbAccess bdd;
	  public static void main(String[] args) {
		if (args.length !=  6){
			System.out.println("il faut 6 argument\n");
			System.out.println("1er id noeud source\n");
			System.out.println("2ème id noeuds destination\n");
			System.out.println("3ème addresse bdd : port\n");
			System.out.println("4ème nom de la bdd\n");
			System.out.println("5ème nom d'utilisateur de la bdd\n");
			System.out.println("6ème mot de passe utilisateur de la bdd\n");
			System.exit(1);
		}
		int firstArg = 0;
		int secondArg = 0;
		Vertex source = null;
		Vertex dest = null;
		if (args.length == 6) {
		    try {
		        firstArg = Integer.parseInt(args[0]);
		        secondArg = Integer.parseInt(args[1]);
		    } catch (NumberFormatException e) {
		        System.err.println("Argument " + args[0] + " must be an integer.");
		        System.err.println("Argument " + args[1] + " must be an integer.");
		        System.exit(1);
		    }
		}
	    
	    bdd = new DbAccess("jdbc:mysql://"+args[2]+"/"+args[3]+"?useSSL=true",args[4],args[5]);
	    nodes = bdd.get_points();
	    edges = bdd.get_edges();
	    
	    for(int j=0;j<nodes.size();j++){
   			if(Integer.parseInt(nodes.get(j).getId()) == firstArg){
   				source = nodes.get(j);
   			}
   		}
   		for(int k=0;k<nodes.size();k++){
   			if(Integer.parseInt(nodes.get(k).getId()) == secondArg){
   				dest = nodes.get(k);
   			}
   		}
	    Graph graph = new Graph(nodes, edges);
	    DijkstraAlgorithm dijkstra = new DijkstraAlgorithm(graph);
	    dijkstra.execute(source);
	    LinkedList<Vertex> path = dijkstra.getPath(dest);
	    
	    Path file = Paths.get("path.txt");
	    try {
			BufferedWriter writer = Files.newBufferedWriter(file, StandardCharsets.UTF_8);
			for (Vertex vertex : path) {
				System.out.println(vertex);
				writer.write(vertex.getName());
				writer.newLine();
			}
			writer.close();
		} catch (IOException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
	    
	  }

}
