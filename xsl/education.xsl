
<!DOCTYPE stylesheet [
<!ENTITY Eacute  "&Eacute;" >
]>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
	<xsl:choose>
	<xsl:when test="$rss = '0'">
	<h2>
			<xsl:if test="$hl='en'">EDUCATION (French Awards)
			</xsl:if>
			<xsl:if test="$hl='fr'">FORMATION INITIALE</xsl:if>
			</h2>
	<ul>
		<xsl:for-each select="//item">
				<li><xsl:value-of disable-output-escaping="yes"  select="year"/>: <xsl:value-of disable-output-escaping="yes"  select="degree"/>
				<br/>
				<xsl:value-of disable-output-escaping="yes"  select="text"/>
				<br/><br/>
				</li>
			</xsl:for-each>
	</ul>
	<br/>
<br/>
<table align="center">
<tr>
<td><a href="http://www.univ-tln.fr/"> 
	 	<img src="../img/u_toulon.png" width="300" height="44" 
	border="0" alt="Universite de Toulon et du Var (83)"/>
	 </a> </td><td><a href="http://www.ujf-grenoble.fr/">
	<img src="../img/UJFlogo.gif" width="300" height="77" 
	border="0" alt="Universite Joseph Fourier	Grenoble I (38)"/>
	</a></td><td><a href="http://www.univ-cezanne.fr/"> 
		<img src="../img/logo_u3.jpg" width="300" height="70" 
	border="0" alt="Universite Aix-Marseille III (13)"/>
		</a> </td>
</tr>
</table>
</xsl:when>
<xsl:otherwise>
<table align="center" border="2" 
			summary="your browser cannot display tables">
		<tbody> <tr>
			<xsl:if test="$hl='en'">
		<th>Year</th>
		<th>Degree</th>
		<th>Summary</th>
		</xsl:if>
		<xsl:if test="$hl='fr'">
		<th>Promotion</th>
		<th>Titre</th>
		<th>Contenu</th>
			</xsl:if>
		</tr>
		<xsl:for-each select="//item[1]">
		<tr>
				<td>
				<xsl:value-of disable-output-escaping="yes"  select="year"/>
</td><td> <xsl:value-of disable-output-escaping="yes"  select="degree"/>
				</td><td>
				<xsl:value-of disable-output-escaping="yes"  select="text"/>
				</td>
				</tr>
			</xsl:for-each>
	</tbody>
	</table>
</xsl:otherwise>
</xsl:choose>
	</xsl:template>
</xsl:stylesheet>