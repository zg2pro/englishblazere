<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" indent="yes" />
	<xsl:template match="/">
	<xsl:choose>
	<xsl:when test="$rss = '0'">
	<ul class="breadcrumb"> <li class="active">
			<h2>
			<xsl:if test="$hl='en'">
			PROFESSIONAL EXPERIENCE
			</xsl:if>
			<xsl:if test="$hl='fr'">
			EXPERIENCES PROFESSIONNELLES
			</xsl:if>
			</h2>
			</li></ul>
		<table align="center" border="2" 
			summary="your browser cannot display tables" class="table-bordered">
		<thead> <tr>
			<xsl:if test="$hl='en'">
		<th>Organization</th>
		<th>Date</th>
		<th>Role / Nature of work</th>
		</xsl:if>
			<xsl:if test="$hl='fr'">
			<th>Employeur</th>
		<th>Date</th>
		<th>Emploi / Nature du Travail</th>
			</xsl:if>
		</tr>
		</thead>
		<tbody>
			<xsl:for-each select="//item">
				<tr>
				<td>	       
		<xsl:value-of disable-output-escaping="yes" select="organization"/>

		</td>
				<td><xsl:value-of disable-output-escaping="yes" select="date"/></td>
				<td><xsl:value-of disable-output-escaping="yes" select="role"/></td></tr>
			</xsl:for-each>
		</tbody>
		</table>
		
	</xsl:when>
	<xsl:otherwise>
		 <table align="center" border="2" 
			summary="your browser cannot display tables">
		<tbody> <tr>
			<xsl:if test="$hl='en'">
		<th>Organization</th>
		<th>Date</th>
		<th>Role / Nature of work</th>
		</xsl:if>
			<xsl:if test="$hl='fr'">
			<th>Employeur</th>
		<th>Date</th>
		<th>Emploi / Nature du Travail</th>
			</xsl:if>
		</tr>
			<xsl:for-each select="//item[1]">
				<tr>
				<td>	       
		<xsl:value-of disable-output-escaping="yes" select="organization"/>

		</td>
				<td><xsl:value-of disable-output-escaping="yes" select="date"/></td>
				<td><xsl:value-of disable-output-escaping="yes" select="role"/></td></tr>
			</xsl:for-each>
		</tbody>
		</table>
	</xsl:otherwise>
	</xsl:choose>
	</xsl:template>
	
	
	
</xsl:stylesheet>