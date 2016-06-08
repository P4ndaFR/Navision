package dijkstra.model;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
/**
 * Classe de gestion de la connexion à la bdd
 * @author Arnaud & Vogella
 * @version 1.11
 */
public class DbAccess {
	private static String url;
    private static String utilisateur;
    private static String motDePasse;
    private static Connection connexion;
    private List<Vertex> nodes;
	private List<Edge> edges;
	/**
	   * Constructeur de l'accès à la base de donnée
	   * @param url Url de connexion à la base de données (your.domain.name:port)
	   * @param user Utilisateur de la base de données
	   * @param passwd Mot de passe de connexion à la bdd
	   */
    public DbAccess(String url,String user,String passwd){
    		DbAccess.url = url;
    		DbAccess.utilisateur = user;
    		DbAccess.motDePasse = passwd;
    		DbAccess.connexion = getInstance();
    		nodes = new ArrayList<Vertex>();
    	    edges = new ArrayList<Edge>();
    }
    /**
     * Récupère les point de la base de données
     * @return Liste des Noeuds
     */
    public List<Vertex> get_points(){
    	Statement statement;
		try {
			statement = connexion.createStatement();
			ResultSet noeuds = statement.executeQuery( "SELECT ID_PT FROM `POINT`;" );
	    	while ( noeuds.next() ) {
	        	String id = noeuds.getString( "ID_PT" );
	        	Vertex location = new Vertex(id,id);
	            nodes.add(location);
	    	}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return nodes;
    }
    /**
     * Récupère les liaisons de la base de données
     * @return Liste des Noeuds
     */
    public List<Edge> get_edges(){
    	int i =0;
    	try {
			Statement statement = connexion.createStatement();
		   	ResultSet chemins = statement.executeQuery( "SELECT LIAISON.ID_PT AS Source, LIAISON.POI_ID_PT AS Destination, p1.X AS Xa, p1.Y AS Ya, p2.X AS Xb, p2.Y AS Yb FROM POINT p1, POINT p2, LIAISON WHERE LIAISON.ID_PT = p1.ID_PT AND LIAISON.POI_ID_PT = p2.ID_PT" );
		   	while ( chemins.next() ) {
		   		Vertex source = null;
		   		Vertex destination = null;
		   		int Xa = 0;
		   		int Ya = 0;
		   		int Xb = 0;
		   		int Yb = 0;
		   		for(int j=0;j<nodes.size();j++){
		   			if(Integer.parseInt(nodes.get(j).getId()) == Integer.parseInt(chemins.getString( "Source" ))){
		   				//System.out.println(nodes.get(j).getId());
		   				source = nodes.get(j);
		   				Xa = chemins.getInt( "Xa" );
			        	Ya = chemins.getInt( "Ya" );
		   			}
		   		}
		   		for(int j=0;j<nodes.size();j++){
		   			if(Integer.parseInt(nodes.get(j).getId()) == Integer.parseInt(chemins.getString( "Destination" ))){
		   				//System.out.println(nodes.get(j).getId());
		   				destination = nodes.get(j);
		   				Xb = chemins.getInt( "Xb" );
		   				Yb = chemins.getInt( "Yb" );
		   			}
		   		}
	            int distance = (int) Math.sqrt(Math.pow(Xb-Xa, 2)+Math.pow(Yb-Ya, 2));
		        addLane("Edge_"+i, source, destination, distance);
		        i++;
		    }
		} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
    	return edges;
    }
    /**
     * Ajoute la nouvelle liaisons à la liste
     * @param laneId identifiant de la liaison
     * @param source Noeud de départ de la liaison
     * @param dest Noeud de destination de la liaison
     * @param duration Poids de la liaison
     */
    private void addLane(String laneId, Vertex source, Vertex dest, int duration) {
	    Edge lane = new Edge(laneId, source, dest, duration);
	    edges.add(lane);
	}
    /**
     * Création de l'instance de connexion à la base de données
     * @return L'instance de connexion
     */
    private static Connection getInstance(){
    	if(connexion == null){
			try {
				connexion = DriverManager.getConnection(url, utilisateur, motDePasse);
			} catch (SQLException e) {
				e.printStackTrace();
			}
		}		
		return connexion;
    }
    }
