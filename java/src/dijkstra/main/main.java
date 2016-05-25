package dijkstra.main;

import java.io.BufferedWriter;
import java.io.IOException;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.LinkedList;
import java.util.List;

import dijkstra.engine.DijkstraAlgorithm;
import dijkstra.model.Edge;
import dijkstra.model.Graph;
import dijkstra.model.Vertex;

public class main {
	private static List<Vertex> nodes;
	  private static List<Edge> edges;
	  public static void main(String[] args) {
		for(int i = 0; i < args.length; i++) {
            System.out.println(args[i]);
        }
		if (args.length !=  2){
			System.out.println("il faut 2 argument de type int");
		}
		int firstArg;
		int secondArg;
		if (args.length == 2) {
		    try {
		        firstArg = Integer.parseInt(args[0]);
		        secondArg = Integer.parseInt(args[1]);
		    } catch (NumberFormatException e) {
		        System.err.println("Argument" + args[0] + " must be an integer.");
		        System.err.println("Argument" + args[1] + " must be an integer.");
		        System.exit(1);
		    }
		}
		nodes = new ArrayList<Vertex>();
	    edges = new ArrayList<Edge>();
	    firstArg = Integer.parseInt(args[0]);
	    secondArg = Integer.parseInt(args[1]);
	    /*for (int i = 0; i < 11; i++) {
	      Vertex location = new Vertex("Node_" + i, "Node_" + i);
	      nodes.add(location);
	    }*/
	    
	    try {
	        Class.forName( "com.mysql.jdbc.Driver" );
	    } catch ( ClassNotFoundException e ) {
	        /* Gérer les éventuelles erreurs ici. */
	    }
	    String url = "jdbc:mysql://localhost:3306/Navision?useSSL=true";
	    String utilisateur = "Navision";
	    String motDePasse = "Navision";
	    Connection connexion = null;
	    int i =0;
	    try {
	        connexion = DriverManager.getConnection( url, utilisateur, motDePasse );
	        Statement statement1 = connexion.createStatement();
	        Statement statement2 = connexion.createStatement();
	        //ResultSet chemins = statement1.executeQuery( "SELECT POI_ID_PT,ID_PT,distance FROM `LIAISON`;" );
	        ResultSet chemins = statement1.executeQuery( "SELECT LIAISON.ID_PT AS Source, LIAISON.POI_ID_PT AS Destination, p1.X AS Xa, p1.Y AS Ya, p2.X AS Xb, p2.Y AS Yb FROM POINT p1, POINT p2, LIAISON WHERE LIAISON.ID_PT = p1.ID_PT AND LIAISON.POI_ID_PT = p2.ID_PT AND p1.ETAGE = 1 " );
	        ResultSet noeuds = statement2.executeQuery( "SELECT ID_PT FROM `POINT`;" );
	        
	        /* Récupération des données du résultat de la requête de lecture */
	        while ( noeuds.next() ) {
	        	int id = noeuds.getInt( "ID_PT" );
	        	Vertex location = new Vertex("Node_" + id, "Node_" + id);
	            nodes.add(location);
	        }
	        while ( chemins.next() ) {
	            int source = chemins.getInt( "Source" );
	            int destination = chemins.getInt( "Destination" );
	            //int distance = chemins.getInt( "distance" );
	            int Xa = chemins.getInt( "Xa" );
	            int Ya = chemins.getInt( "Ya" );
	            int Xb = chemins.getInt( "Xb" );
	            int Yb = chemins.getInt( "Yb" );
	            int distance = (int) Math.sqrt(Math.pow(Xb-Xa, 2)+Math.pow(Yb-Ya, 2));
	            /* Traiter ici les valeurs récupérées. */
	            addLane("Edge_"+i, source, destination, distance);
	            i++;
	        }
	    } catch ( SQLException e ) {
	        /* Gérer les éventuelles erreurs ici */
	    } finally {
	        if ( connexion != null )
	            try {
	                /* Fermeture de la connexion */
	                connexion.close();
	            } catch ( SQLException ignore ) {
	                /* Si une erreur survient lors de la fermeture, il suffit de l'ignorer. */
	            }
	    }
	    
	    /*addLane("Edge_0", 0, 1, 85);
	    addLane("Edge_1", 0, 2, 217);
	    addLane("Edge_2", 0, 4, 173);
	    addLane("Edge_3", 2, 6, 186);
	    addLane("Edge_4", 2, 7, 103);
	    addLane("Edge_5", 3, 7, 183);
	    addLane("Edge_6", 5, 8, 250);
	    addLane("Edge_7", 8, 9, 84);
	    addLane("Edge_8", 7, 9, 167);
	    addLane("Edge_9", 4, 9, 502);
	    addLane("Edge_10", 9, 10, 40);
	    addLane("Edge_11", 1, 10, 600);*/

	    // Lets check from location Loc_1 to Loc_10
	    Graph graph = new Graph(nodes, edges);
	    DijkstraAlgorithm dijkstra = new DijkstraAlgorithm(graph);
	    dijkstra.execute(nodes.get(firstArg));
	    LinkedList<Vertex> path = dijkstra.getPath(nodes.get(secondArg));
	    
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

	  private static void addLane(String laneId, int sourceLocNo, int destLocNo, int duration) {
	    Edge lane = new Edge(laneId,nodes.get(sourceLocNo), nodes.get(destLocNo), duration);
	    edges.add(lane);

	}

}
