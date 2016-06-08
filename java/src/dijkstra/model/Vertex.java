package dijkstra.model;
/**
 * Classe de gestion des Noeuds
 * @author Vogella
 * @version 1.1
 */
public class Vertex {
  final private String id;
  final private String name;
  
  /**
   * Constructeur du Noeud
   * @param id Identifiant du Noeud
   * @param name Nom du Noeud
   */
  public Vertex(String id, String name) {
    this.id = id;
    this.name = name;
  }
  /**
   * Getter Identifiant
   * @return L'identifiant du noeud
   */
  public String getId() {
    return id;
  }
  /**
   * Getter du nom
   * @return Nom du Noeud
   */
  public String getName() {
    return name;
  }
  /**
   * Réécriture de la fonction de hash du point
   * @return Le nouveau hash du Noeud
   */
  @Override
  public int hashCode() {
    final int prime = 31;
    int result = 1;
    result = prime * result + ((id == null) ? 0 : id.hashCode());
    return result;
  }
  /**
   * Réécriture de la fonction d'égualité de noeud
   * @return Vrai(true) si les Noeuds sont identiques
   */
  @Override
  public boolean equals(Object obj) {
    if (this == obj)
      return true;
    if (obj == null)
      return false;
    if (getClass() != obj.getClass())
      return false;
    Vertex other = (Vertex) obj;
    if (id == null) {
      if (other.id != null)
        return false;
    } else if (!id.equals(other.id))
      return false;
    return true;
  }
  /**
   * permet de passé le Noeud en chaine de caractère
   * @return le nom du Noeud
   */
  @Override
  public String toString() {
    return name;
  }
  
} 