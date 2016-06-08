package dijkstra.model;
/**
 * Classe de gestion du Graph
 * @author Vogella
 * @version 1.1
 */
import java.util.List;

public class Graph {
  private final List<Vertex> vertexes;
  private final List<Edge> edges;
  /**
   * Constructeur du graph
   * @param vertexes Liste de tout les Noeuds
   * @param edges Liste de toute les liaisons
   */
  public Graph(List<Vertex> vertexes, List<Edge> edges) {
    this.vertexes = vertexes;
    this.edges = edges;
  }
  /**
   * Getter Liste Noeuds
   * @return Liste des Noeuds
   */
  public List<Vertex> getVertexes() {
    return vertexes;
  }
  /**
   * Getter Liste de liaisons
   * @return Liste des liaisons
   */
  public List<Edge> getEdges() {
    return edges;
  }
  
  
  
} 

