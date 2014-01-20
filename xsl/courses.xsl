

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
	<xsl:choose>
	<xsl:when test="$rss = '0'">
	<ul class="breadcrumb"> <li class="active">
			<h2>
			<xsl:if test="$hl='en'">HANDS-ON COURSES
			</xsl:if>
			<xsl:if test="$hl='fr'">FORMATION CONTINUE</xsl:if>
			</h2>
			</li></ul>
	<ul>
		<xsl:for-each select="//item">
				<li><xsl:value-of disable-output-escaping="yes"  select="year"/>: <xsl:value-of disable-output-escaping="yes"  select="degree"/>
				<br/>
				<xsl:value-of disable-output-escaping="yes"  select="text"/>
				<br/><br/>
				</li>
			</xsl:for-each>
	</ul>
	<br/><br/>
</xsl:when>
<xsl:otherwise>
<table align="center" border="2" 
			summary="your browser cannot display tables">
		<tbody> <tr>
			<xsl:if test="$hl='en'">
		<th>Year</th>
		<th>Course</th>
		<th>Summary</th>
		</xsl:if>
		<xsl:if test="$hl='fr'">
		<th>Annee</th>
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